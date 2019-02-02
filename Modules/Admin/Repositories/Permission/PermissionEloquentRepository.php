<?php
namespace Modules\Admin\Repositories\Permission;
use DB;
use Modules\Admin\Repositories\AdminsEloquentRepository;
use Modules\Admin\Repositories\Permission\PermissionRepositoryInterface;

class PermissionEloquentRepository extends AdminsEloquentRepository implements PermissionRepositoryInterface
{

    public function getModel()
    {
        return \Modules\Admin\Models\Permission::class;
    }
    
    public function save(array $data)
    {
        $permission = $this->setPermission($data);

        $permission_id = $this->_model->insertGetId($permission);

        return $permission_id;
    }   

    public function update(array $data,$id)
    {
        $permission = $this->setPermission($data);

        $this->_model->where('id',$id)->update($permission);

    }

    public function setPermission(array $data)
    {
        $permission = [];
        $permission['name'] = $data['name'];
        $permission['description'] = $data['description'];
        if($data['group_id'])
        {
            $permission['group_id'] = $data['group_id'];
        }
        return $permission;
    }
}