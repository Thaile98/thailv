<?php
namespace Modules\Admin\Repositories\Role;
use DB;
use Modules\Admin\Repositories\AdminsEloquentRepository;
use Modules\Admin\Repositories\Role\RoleRepositoryInterface;

class RoleEloquentRepository extends AdminsEloquentRepository implements RoleRepositoryInterface
{

    public function getModel()
    {
        return \Modules\Admin\Models\Role::class;
    }

    public function getList()
    {
        return $this->_model->select('id','name','description')->with('permissions:id,name')->get();
    }

    public function save(array $data)
    {
    	$role_id = $this->_model->insertGetId(['name'=>$data['name'],'description'=>$data['description']]);
    
    	return $role_id;
    }

    public function update(array $data,$id)
    {
        $this->_model->where('id',$id)->update(['name'=>$data['name'],'description'=>$data['description']]);
    }
}