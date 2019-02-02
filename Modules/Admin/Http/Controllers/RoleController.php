<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Admin\Models\Permission;
use Modules\Admin\Models\PermissionGroup;
use Modules\Admin\Models\Role;
use Illuminate\Http\Request;
use DB;
use Modules\Admin\Repositories\Role\RoleRepositoryInterface;

class RoleController extends Controller
{
    protected $roleRepositoryInterface;

    public function __construct(RoleRepositoryInterface $roleRepositoryInterface)
    {
        $this->roleRepositoryInterface = $roleRepositoryInterface;
    }

    public function getList()
    {
        $roles = $this->roleRepositoryInterface->getList();
        return view('admin::role.list_role',compact('roles'));
    }

    public function create()
    {
        $per_groups = PermissionGroup::with('permissions')->select('id','pgr_name')->get();
        return view('admin::role.create_role',compact('per_groups'));
    }

    public function store(Request $request)
    {
        $role_id = $this->roleRepositoryInterface->save($request->all());
        
        if($request['pers'])
        {
            foreach ($request['pers'] as $permission_id => $value)
            {
                DB::table('permission_role')->insert(['role_id'=>$role_id,'permission_id'=>$permission_id]);
            } 
        }
        return redirect()->route('get.role.list')->with('success','Tạo vai trò mới thành công!');
    }

    public function edit($id)
    {
        $role = $this->roleRepositoryInterface->find($id);
        $per_groups = PermissionGroup::with('permissions')->select('id','pgr_name')->get();
        return view('admin::role.edit_role',compact('role','per_groups'));
    }

    public function update(Request $request,$id)
    {
        DB::table('permission_role')->where('role_id',$id)->delete();

        $admin = $this->adminRepositoryInterface->update($request->all(),$id);
        
        if($request['pers'])
        {
            foreach ($request['pers'] as $permission_id => $value)
            {
                DB::table('permission_role')->insert(['role_id'=>$id,'permission_id'=>$permission_id]);
            } 
        }

        return redirect()->route('get.role.list')->with('success','Sửa vai trò thành công!!!');
    }

    public function delete($id)
    {
        $this->adminRepositoryInterface->delete($id);
        
        return redirect()->back()->with('success','Xóa vai trò thành công!');
    }
}
