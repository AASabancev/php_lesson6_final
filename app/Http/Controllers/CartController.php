<?php

namespace App\Http\Controllers;

use App\Exceptions\GoodNotSendException;
use App\Helpers\CartHelper;
use App\Helpers\PageHelper;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cartPage(Request $request)
    {
        $data = PageHelper::defaultPageData();
        $data['cart'] = CartHelper::getCartObject();
        $data['page_title'] = "Корзина";
        return view('cart', compact('data'));
    }

    public function addCart(Request $request)
    {
        $good_id = $request->get('good_id');
        if (empty($good_id)) {
            throw new GoodNotSendException();
        }

        CartHelper::addToCart($good_id);

        return [
            'status' => true,
            'cart_count' => CartHelper::getCartCount(),
        ];
    }

    public function clearCart(Request $request){
        CartHelper::clearCart();
        return [
            'status' => true
        ];
    }

}
