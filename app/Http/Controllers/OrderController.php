<?php

namespace App\Http\Controllers;

use App\Helpers\PageHelper;
use App\Http\Requests\Cart\MakeOrderRequest;
use App\Repositories\OrderRepository;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderRepository;
    protected $orderService;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
        $this->orderService = new OrderService();
    }

    public function orders(Request $request)
    {
        $data = PageHelper::defaultPageData();
        $data['page_title'] = "Заказы";
        $data['orders'] =  $this->orderRepository->getOrders();

        return view('orders.list', compact('data'));
    }


    public function orderPage(Request $request, int $order_id)
    {
        $data = PageHelper::defaultPageData();
        $data['order'] = $this->orderRepository->getOrderPage($order_id);

        $data['total_sum'] = $data['order']->getTotalSum();
        $data['page_title'] = "Заказ №" . $data['order']->id;
        return view('orders.page', compact('data'));
    }


    public function makeOrder(MakeOrderRequest $request){
        $data = $request->validated();

        $order = $this->orderService->makeOrder($data);

        return redirect('/orders/'. $order->id );
    }


}
