<?php
namespace Modules\Admin\Repositories\Admin;

interface AdminRepositoryInterface
{
    public function getList(array $data);

    public function save(array $data);

    public function update(array $data,$id);
}