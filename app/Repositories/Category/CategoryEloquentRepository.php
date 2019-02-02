<?php
namespace App\Repositories\Category;

use App\Repositories\EloquentRepository;
use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryEloquentRepository extends EloquentRepository implements CategoryRepositoryInterface
{

    public function getModel()
    {
        return \App\Models\Category\CategoryMutilple::class;
    }
}