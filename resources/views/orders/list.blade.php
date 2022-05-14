@include('site.header')

<div class="middle">

@include('components.sidebar')

    <div class="main-content">

        @include('components.content_top')

        <div class="content-middle">

            @include('components.content_head')

            <div class="content-main__container">
                <div class="cart-product-list">

                    @if (!empty($data['orders']))
                        @foreach( $data['orders'] as $order )
                            <div class="cart-product-list__item">
                                <div class="cart-product__item__product-photo">
                                    <img src="{{ $order->getImage() }}" class="cart-product__item__product-photo__image">
                                </div>
                                <div class="cart-product__item__product-name">
                                    <div class="cart-product__item__product-name__content">
                                        <a href="{{ route('orderPage', ['order_id' => $order->id]) }}">Заказ № {{ $order->id }}</a>
                                        @if($order->order_goods()->exists())
                                            <div style="font-style: italic;font-size:11px;">
                                                {{ $order->order_goods->pluck('title')->join(', ') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="cart-product__item__cart-date">
                                    <div class="cart-product__item__cart-date__content">{{ $order->created_at->format('d.m.Y') }}</div>
                                </div>
                                <div class="cart-product__item__product-price">
                                    <span class="product-price__value">{{ $order->getTotalSum() }} рублей</span>
                                </div>
                            </div>

                        @endforeach
                    @endif


                </div>
            </div>

        </div>
        <div class="content-bottom"></div>
    </div>
</div>

@include('site.footer')
