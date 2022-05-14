<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends AbstractRepository
{
    protected $model = Category::class;

    public function getById(int $category_id)
    {
        return $this->getModel()
            ->find($category_id);
    }
}
