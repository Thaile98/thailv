<?php

namespace Modules\Admin\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    use Notifiable;

    public function permission_group()
    {
    	return $this->belongTo(PermissionGroup::class,'group_id')->select('id','pgr_name');
    } 

    public function roles()
    {
        return $this->belongsToMany(Role::class,'permission_role');
    }

}
