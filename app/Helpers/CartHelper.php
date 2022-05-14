<?php

namespace App\Helpers;

use App\Models\Good;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class CartHelper
{
    public static function getCart(): array
    {
        return Session::get('cart') ?? [];
    }

    public static function addToCart(int $good_id)
    {
        $cart = self::getCart();

        $cart[$good_id] = ($cart[$good_id] ?? 0) + 1;

        Session::put('cart', $cart);
        Session::save();
    }

    public static function getCartCount(): int
    {
        $cart = self::getCart();
        if (empty($cart)) {
            return 0;
        }

        $counter = 0;
        foreach ($cart as $good_id => $cart_count) {
            $counter += $cart_count;
        }

        return $counter;
    }


    public static function clearCart()
    {
        Session::remove('cart');
        Session::save();
    }

    public static function getCartObject(): array
    {
        $cart = collect(CartHelper::getCart());
        $cartGoods = Good::query()
            ->whereIn('id', $cart->keys())
            ->get()
            ->keyBy('id');


        $result = [
            'items' => [],
            'totals' => [
                'count' => 0,
                'sum' => 0,
            ],
        ];
        if(!empty($cart)){
            foreach( $cart as $good_id => $count ){
                if(!isset($cartGoods[$good_id])){
                    continue;
                }

                $item = [
                    'good_id' => $good_id,
                    'good' => $cartGoods[$good_id],
                    'count' => $count,
                    'cost' => $cartGoods[$good_id]->cost,
                    'sum' => $cartGoods[$good_id]->cost * $count,
                ];

                $result['totals']['count'] += $item['count'];
                $result['totals']['sum'] += $item['sum'];
                $result['items'][] = $item;
            }
        }
        return $result;
    }
}
