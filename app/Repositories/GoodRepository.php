<?php

namespace App\Repositories;

use App\Models\Good;

class GoodRepository extends AbstractRepository
{
    protected $model = Good::class;

    public function getById(int $category_id)
    {
        return $this->getModel()
            ->find($category_id);
    }

    public function getRandomItems($limit = 3)
    {
        return $this->getModel()
            ->inRandomOrder()
            ->when($limit > 1, function ($query) {
                return $query
                    ->limit(3)
                    ->get();
            }, function ($query) {
                return $query->first();
            });
    }

    public function getGroupsByFilter(array $filter = [], int $goods_on_page = 6)
    {
        $query = $this->getModel()
            ->when(!empty($filter['category_id']), function ($query) use ($filter) {
                return $query->where('category_id', $filter['category_id']);
            })
            ->when(!empty($filter['search']), function ($query) use ($filter) {
                return $query->where('title', 'LIKE', '%' . $filter['search'] . '%');
            })
            ->orderBy('title');

        $data = [];
//        $data['query'] = $query->toSql();
//        $data['query_values'] = $query->getBindings();
        $data['goods'] = $query->limit($goods_on_page)->get();
        $data['goods_count'] = $query->count();
        $data['pagination'] = ceil($data['goods_count'] / $goods_on_page);

        return $data;
    }
}
