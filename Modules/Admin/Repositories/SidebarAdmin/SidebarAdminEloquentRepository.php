<?php
namespace Modules\Admin\Repositories\SidebarAdmin;
use DB;
use Modules\Admin\Repositories\AdminsEloquentRepository;
use Modules\Admin\Repositories\SidebarAdmin\SidebarAdminRepositoryInterface;

class SidebarAdminEloquentRepository extends AdminsEloquentRepository implements SidebarAdminRepositoryInterface
{

    public function getModel()
    {
        return \Modules\Admin\Models\SidebarAdminService::class;
    }

    public function save(array $data)
    {
    	$item = $this->setItem($data);
        $this->_model->name          = $data['name'];
        if(isset($data['permission']))
        {
            $this->_model->permission    = $data['permission'];
        }
        $this->_model->icon          = $data['icon'];
        $this->_model->item          = $item;
        $this->_model->save();
        return $this->_model;
    }

    public function update(array $data,$id)
    {
    	$sidebarItem = $this->_model->findOrFail($id);
        $item = $this->setItem($data);
        $sidebarItem->name          = $data['name'];
        if(isset($data['permission']))
        {
            $sidebarItem->permission    = $data['permission'];
        }
        $sidebarItem->icon          = $data['icon'];
        $sidebarItem->item          = $item;
        $sidebarItem->save();
        return $sidebarItem;
    }

    public function setItem(array $data)
    {
        $item = [];
        $item_link = $data['item_link'];
        $item_name = $data['item_name'];
        $lenght = count($item_link);
        for ($i=0; $i < $lenght ; $i++)
        {
            $item[$item_name[$i]] = $item_link[$i];
        }
        $item = json_encode($item);
        return $item;
    }
}