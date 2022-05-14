<?php

namespace App\Services;

use App\Helpers\CartHelper;
use App\Mail\OrderCreatedMail;
use App\Models\Order;
use App\Models\Setting;
use Illuminate\Support\Facades\Mail;

class OrderService extends AbstractService
{
    protected $model = Order::class;

    public function makeOrder($data)
    {
        $cart = CartHelper::getCartObject();

        $order = $this->getModel()->create([
            'author_id' => request()->user()->id,
            'email' => $data['email'],
            'address' => $data['address'],
        ]);

        foreach ($cart['items'] as $item) {
            $order->order_goods()->create([
                'good_id' => $item['good_id'],
                'title' => $item['good']->title,
                'count' => $item['count'],
                'cost' => $item['cost'],
            ]);
        }

        $this->sendNewOrderMail($order->id);
        CartHelper::clearCart();
        return $order;
    }

    public function sendNewOrderMail($order_id)
    {
        /* @var \App\Models\Order $order */
        $order = $this->getModel()
            ->with('order_goods')
            ->find($order_id);

        if (!$order) {
            return;
        }

        $send_to = Setting::query()->firstWhere('key', 'orders_email')->value;
        if (!$send_to) {
            return;
        }

        Mail::to($send_to)->send(new OrderCreatedMail($order));
    }
}
