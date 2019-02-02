<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Admin\Models\PermissionGroup;
use Illuminate\Http\Request;
use DB;
use Modules\Admin\Repositories\Permission\PermissionRepositoryInterface;
use Modules\Admin\Repositories\Role\RoleRepositoryInterface;

class PermissionController extends Controller
{
    protected $permissionRepositoryInterface;
    protected $roleRepositoryInterface;

    public function __construct(PermissionRepositoryInterface $permissionRepositoryInterface,RoleRepositoryInterface $roleRepositoryInterface)
    {
        $this->permissionRepositoryInterface = $permissionRepositoryInterface;
        $this->roleRepositoryInterface = $roleRepositoryInterface;
    }

    public function getList()
    {
        $per_groups = PermissionGroup::with('permissions')->select('id','pgr_name')->get();
        return view('admin::permission.list_permission',compact('per_groups'));
    }

    public function create()
    {
        $roles = $this->roleRepositoryInterface->getAllWithIdAndName();
        $per_groups = DB::table('permission_groups')->select('id','pgr_name')->get();
        return view('admin::permission.create_permission',compact('roles','per_groups'));
    }

    public function store(Request $request)
    {
        
        $permission_id = $this->permissionRepositoryInterface->save($request->all());

        if($request['roles'])
        {
            foreach ($request['roles'] as $role_id => $value)
            {
                DB::table('permission_role')->insert(['role_id'=>$role_id,'permission_id'=>$permission_id]);
            } 
        }

        return redirect()->route('get.permission.list')->with('success','Tạo quyền mới thành công!!!');
    }

    public function edit($id)
    {
        $permission = $this->permissionRepositoryInterface->find($id);
        $roles = $this->roleRepositoryInterface->getAllWithIdAndName();
        $per_groups = DB::table('permission_groups')->select('id','pgr_name')->get();
        return view('admin::permission.edit_permission',compact('per_groups','permission','roles'));
    }

    public function update(Request $request,$id)
    {
        $this->permissionRepositoryInterface->update($request->all(),$id);

        DB::table('permission_role')->where('permission_id',$id)->delete();

        if($request['roles'])
        {
            foreach ($request['roles'] as $role_id => $value)
            {
                DB::table('permission_role')->insert(['role_id'=>$role_id,'permission_id'=>$id]);
            } 
        }

        return redirect()->route('get.permission.list')->with('success','Cập nhật quyền thành công!!!');
    }

    public function delete($id)
    {
        $this->permissionRepositoryInterface->delete($id);
        return redirect()->back()->with('success','Xóa quyền thành công!');
    }
}
