<?php
namespace Modules\Admin\Repositories\Article;

interface AdminArticleRepositoryInterface
{
    public function viewAjax(array $data);

    public function getList(array $data);

    public function save(array $data);

    public function edit($id);

    public function update(array $data,$id);

    public function accept($id);

    public function cancel(array $data);
}