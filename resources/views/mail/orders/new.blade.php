<h1>Поздравляем!</h1>
<div>
    У вас новый заказ!
</div>

<div>
    Заказчик: {{ $order->email }}
</div>
<div>
    Адрес доставки: {{ $order->address }}
</div>

<h2>Товары в заказе:</h2>
@if( $order->order_goods )
    <table border="1" cellpadding="3" cellspacing="0" width="100%">
        @foreach($order->order_goods as $order_good )
            <tr>
                <td>
                    <img src="{{ $order_good->getImage() }}" style="max-width:100px">
                </td>
                <td>
                    {{ $order_good->title }}
                </td>
                <td>
                    {{ $order_good->count }}
                </td>
                <td>
                    {{ $order_good->count * $order_good->cost }}
                </td>
            </tr>
        @endforeach
        <tr>
            <th colspan="3" align="right">
               Итого:
            </th>
            <th>{{ $order->getTotalSum() }}</th>
        </tr>
    </table>
@endif
