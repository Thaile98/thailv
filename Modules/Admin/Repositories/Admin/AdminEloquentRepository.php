<?php
namespace Modules\Admin\Repositories\Admin;
use DB;
use Modules\Admin\Repositories\AdminsEloquentRepository;
use Modules\Admin\Repositories\Admin\AdminRepositoryInterface;

class AdminEloquentRepository extends AdminsEloquentRepository implements AdminRepositoryInterface
{

    public function getModel()
    {
        return \Modules\Admin\Models\Admin::class;
    }

    public function getList(array $data)
    {
    	$admins = $this->_model->raw(1);

    	if(isset($data['id']))
    	{
    	    $admins->where('id',$data['id']);
    	}
    	if(isset($data['name']))
    	{
    	    $admins->where('name', 'like', '%' . $data['name'] . '%');
    	}
    	if(isset($data['email']))
    	{
    	    $admins->where('email', 'like', '%' . $data['email'] . '%');
    	}
    	if(isset($data['role_id']))
    	{
    		$role_id = $data['role_id'];
    	    $admins->join('role_admin',function ($join) use ($role_id) {
    	                                    $join->on('admins.id', '=', 'role_admin.admin_id')
    	                                        ->where('role_admin.role_id', '=', $role_id);
    	                                });
    	}

    	$admins = $admins->with('roles:id,name')->select('id','name','email')->paginate(10);

    	return $admins;
    }

    public function save(array $data)
    {
    	$admin = $this->_model->create([
    	    'name' => $data['name'],
    	    'email' => $data['email'],
    	    'password' => bcrypt($data['password']),
    	]);

    	return $admin;
    }

    public function update(array $data,$id)
    {
    	$admin = $this->_model->findOrFail($id);

    	$admin->name = $data['name'];
    	$admin->email = $data['email'];
    	if($data['password'])
    	{
    	    $admin->password = bcrypt($data['password']);
    	}

    	$admin->save();

    	return $admin;
    }
}