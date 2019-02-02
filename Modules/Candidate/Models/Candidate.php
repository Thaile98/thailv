<?php

namespace Modules\Candidate\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Authenticatable
{
	use Notifiable;
    use EntrustUserTrait;

    protected $table = 'candidates';
    protected $fillable = [
        'id','name', 'email', 'password','phone','verify_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function resetPassword($request)
    {
        $candidate = $this::findOrFail($request->id);
        $candidate->password = bcrypt($request->password);
        $candidate->save();
        return 1;
    }
}
