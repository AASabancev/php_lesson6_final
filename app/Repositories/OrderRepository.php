<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository extends AbstractRepository
{
    protected $model = Order::class;

    public function getOrders()
    {
        return $this->getModel()
            ->with('order_goods')
            ->when(!request()->user()->isAdmin(), function ($query) {
                return $query->where('author_id', request()->user()->id);
            })
            ->orderByDesc('id')
            ->get();
    }

    public function getOrderPage($order_id)
    {
        return $this->getModel()
            ->with('order_goods')
            ->where('author_id', request()->user()->id)
            ->find($order_id);
    }
}
