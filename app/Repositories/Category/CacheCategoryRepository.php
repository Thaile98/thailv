<?php
namespace App\Repositories\Category;

use App\Models\Category\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Category\CategoryEloquentRepository;
use Cache;

class CacheCategoryRepository implements CategoryRepositoryInterface
{
    /*
     * @var CategoryEloquentRepository
     */
    private $categoryRepository;
    
    public function __construct(CategoryEloquentRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function find($id)
    {
        return Cache::store('file')->remember("categories.id.{$id}", 60, function() use ($id) {
            return $this->categoryRepository->find($id);
        });
    }
}