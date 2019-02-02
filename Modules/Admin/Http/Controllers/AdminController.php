<?php   
namespace Modules\Admin\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Admin\Repositories\Admin\AdminRepositoryInterface;
use Modules\Admin\Repositories\Role\RoleRepositoryInterface;

class AdminController extends Controller
{
    use ValidatesRequests;
    protected $adminRepositoryInterface;
    protected $roleRepositoryInterface;

    public function __construct(AdminRepositoryInterface $adminRepositoryInterface,
                                RoleRepositoryInterface $roleRepositoryInterface)
    {
        $this->adminRepositoryInterface = $adminRepositoryInterface;
        $this->roleRepositoryInterface = $roleRepositoryInterface;
    }

    public function getLogin()
    {
        return view('admin::admin.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];        
        $remember_me = true;
 
        if(Auth::guard('admins')->attempt($credentials, $remember_me))
        {
            return redirect('/admin/dashboard');
        }
        
        return redirect()->back();
    }
 
    public function getLogout()
    {
        Auth::guard('admins')->logout();
        session()->flush();
        return redirect()->guest('/authenticate/login');
    }

    public function getList(Request $request)
    {
        $roles = DB::table('roles')->select('id','name')->get();

        $admins = $this->adminRepositoryInterface->getList($request->all());

        $viewData = 
        [
            'admins'   => $admins,
            'roles'     => $roles,
            'quering'    => $request->query(),
        ];

        return view('admin::admin.list_admin',$viewData);
    }

    public function create()
    {
        $roles = $this->adminRepositoryInterface->getAllWithIdAndName();
        return view('admin::admin.create_admin',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
        ]);

        $admin = $this->adminRepositoryInterface->save($request->all());

        if($request['roles'])
        {
            foreach ($request['roles'] as $role_id => $value)
            {
                $admin->attachRole($role_id);
            } 
        }

        return redirect()->route('get.admin.list')->with('success','Tạo mới tài khoản thành công!');
    }

    public function edit($id)
    {
        $admin = $this->adminRepositoryInterface->find($id);
        $roles = $this->adminRepositoryInterface->getAllWithIdAndName();
        return view('admin::admin.edit_admin',compact('admin','roles'));
    }

    public function update(Request $request,$id)
    {
        $admin = $this->adminRepositoryInterface->update($request->all(),$id);

        DB::table('role_admin')->where('admin_id',$id)->delete();
        if($request->roles)
        {
            foreach ($request->roles as $role_id => $value)
            {
                $admin->attachRole($role_id);
            }
        }
        
        return redirect()->route('get.admin.list')->with('success','Cập nhật tài khoản '.$request->email.' thành công');
    }

    public function delete($id)
    {
        $this->adminRepositoryInterface->delete($id);
        return redirect()->back()->with('success','Xóa tài khoản thành công');
    }
}