<?php
namespace Modules\Admin\Repositories\Role;

interface RoleRepositoryInterface
{
   public function getList();

   public function save(array $data);
   
   public function update(array $data,$id);
}