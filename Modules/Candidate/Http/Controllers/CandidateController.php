<?php

namespace Modules\Candidate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Candidate\Models\Candidate;
use Auth;
use Hash;
use Modules\Candidate\Emails\verifyEmail;
use Modules\Candidate\Emails\ResetPasswordEmail;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function postRegister(Request $request)
    {
        $email = \DB::table('candidates')->where('email',$request->email)->select('email')->first();
        $phone = \DB::table('candidates')->where('phone',$request->phone)->select('phone')->first();

        if($email)
        {
            return response()->json(['errorEmail'=>'Email đã tồn tại ']);
        }
        elseif($phone)
        {
            return response()->json(['errorPhone'=>'Số điện thoại đã tồn tại ']);
        }
        $request['password'] = bcrypt($request['password']);
        $candidate = Candidate::create(request(['name', 'email', 'password','phone','verify_token']));

        $this->sendVerifyMail($candidate);

        return response()->json($request->all());
    }

    public function sendVerifyMail($candidate)
    {
        \Mail::to($candidate['email'])->send(new verifyEmail($candidate));
    }

    public function verifyEmailDone($email,$verify_token)
    {
        $candidate = Candidate::where(['email'=>$email,'verify_token'=>$verify_token])->first();
        if($candidate)
        {
            $candidate->update(['verify_status' => 1, 'verify_token' => null]);
            \Auth::guard('candidates')->login($candidate);
            return redirect('home-page');
        }
        else
        {
            abort(404);
        }
    }

    public function postLogin(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];        
        $remember_me = true;
        if(Auth::guard('candidates')->attempt($credentials, $remember_me))
        {
            return response()->json(['error' => false]);
        }
        return response()->json(['error' => true]);
    }

   public function getLogout()
   {
        Auth::guard('candidates')->logout();
        session()->flush();
        return redirect()->guest('home-page');
    }

    public function getConfirmEmailPassword()
    {
        return view('candidate::confirm_email_reset_password');
    }

    public function postConfirmEmailPassword(Request $request)
    {
        $candidate = Candidate::where('email',$request->email)->select('id','email')->first();
        if($candidate)
        {
            $config_random = new \Thailv\ResetPassword\SetStringRandom;
            $str_random = $config_random->setStringRandom('123job');
            \DB::table('password_resets')->insert([
                                                    'email'         =>  $request->email,
                                                    'token'         =>  $str_random['str_random_hash'],
                                                    'created_at'    =>  \Carbon\Carbon::now()
                                                ]);
            $this->sendResetPasswordMail($candidate,$str_random['str_random']);
            return redirect('/home-page')->with('success','Vui lòng kiểm tra email của bạn!');
        }
        else
        {
            return redirect()->back()->with('error','Tài khoản không tồn tại!');
        }

    }

    public function sendResetPasswordMail($candidate,$str_random)
    {
        \Mail::to($candidate->email)->send(new ResetPasswordEmail($candidate,$str_random));
    }

    public function getResetPassword($id,$token)
    {
        $candidate = Candidate::select('id','email')->findOrFail($id);
        $email = \DB::table('password_resets')->where(['email' => $candidate->email])->select('email','token')->first();
        if($email)
        {
            if (Hash::check($token, $email->token))
            {
                return view('candidate::reset_password',compact('candidate'));
            }
        }
        return view('errors.404');
    }

    public function postResetPassword(Request $request)
    {
        $new = new Candidate;
        if($new->resetPassword($request))
        {
            \DB::table('password_resets')->where(['email' => $request->email])->delete();
            return response()->json(['success' => 'Thay đổi mật khẩu thành công']);
        }
        return response()->json(['error' => 'Có lỗi xảy ra']);
    }

    public function setStringRandom($string)
    {
        $str_random = str_random(15);
        $str_random = $str_random.$string.\Carbon\Carbon::now();
        $str_random_hash = Hash::make($str_random);
        $array = ['str_random'=>$str_random,'str_random_hash'=>$str_random_hash];
        return $array;
    }
}
