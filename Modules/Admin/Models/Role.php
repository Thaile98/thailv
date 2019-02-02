<?php

namespace Modules\Admin\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

	public function permissions()
	{
	    return $this->belongsToMany(Permission::class,'permission_role')->select('id','name');
	}

	public function admins()
	{
	    return $this->belongsToMany(Admin::class,'role_admin')->select('id','name');
	}
}
