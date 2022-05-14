@include('site.header')

<div class="middle">

@include('components.sidebar')

    <div class="main-content">

        @include('components.content_top')

        <div class="content-middle">

            @include('components.content_head')

            <div class="content-main__container">
                <div class="cart-product-list">
                    @if (!empty($data['order']->order_goods))
                        @foreach( $data['order']->order_goods as $order_good )
                            <div class="cart-product-list__item">
                                <div class="cart-product__item__product-photo">
                                    <img src="{{ $order_good->getImage() }}" class="cart-product__item__product-photo__image">
                                </div>
                                <div class="cart-product__item__product-name">
                                    <div class="cart-product__item__product-name__content">
                                        <a href="{{ route('goodPage', ['good_id' => $order_good->good_id]) }}">{{ $order_good->title }}</a>
                                    </div>
                                </div>
                                <div class="cart-product__item__cart-date">
                                    <div class="cart-product__item__cart-date__content">{{ $order_good->count }}</div>
                                </div>
                                <div class="cart-product__item__product-price">
                                    <span class="product-price__value">{{ $order_good->count * $order_good->cost }} рублей</span>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="cart-product-list__result-item">
                        <div class="cart-product-list__result-item__text">Итого</div>
                        <div class="cart-product-list__result-item__value">{{ $data['total_sum'] }} рублей</div>
                    </div>

                </div>
            </div>



        </div>
        <div class="content-bottom"></div>
    </div>
</div>

@include('site.footer')
