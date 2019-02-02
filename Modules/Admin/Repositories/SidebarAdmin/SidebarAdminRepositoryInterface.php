<?php
namespace Modules\Admin\Repositories\SidebarAdmin;

interface SidebarAdminRepositoryInterface
{
    public function save(array $data);

    public function update(array $data,$id);
}