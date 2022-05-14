<?php

namespace App\Services;

use App\Exceptions\NotFoundException;
use App\Models\Category;

class CategoryService extends AbstractService
{
    protected $model = Category::class;

    /**
     * @param int|string $category_id
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model
     */
    public function saveCategory($category_id, array $data)
    {
        $category = $this->getModel()
            ->updateOrCreate([
                'id' => (int)$category_id,
            ], [
                'title' => $data['title'],
                'description' => $data['description'],
            ]);

        return $category;
    }

    public function deleteCategory($category_id)
    {
        $category = $this->getModel()
            ->find($category_id);

        if (!$category) {
            throw new NotFoundException();
        }

        $category->delete();
    }
}
