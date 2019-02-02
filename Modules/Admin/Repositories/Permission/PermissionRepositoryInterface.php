<?php
namespace Modules\Admin\Repositories\Permission;

interface PermissionRepositoryInterface
{

   public function save(array $data);
   
   public function update(array $data,$id);
}