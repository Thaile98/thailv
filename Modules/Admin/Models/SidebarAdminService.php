<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;

class SidebarAdminService extends Model
{
	protected $table = 'sidebar_admin_services';
	
    public function getAllSidebarAdmin()
    {
    	return $this::all();
    }
}
