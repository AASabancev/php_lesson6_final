@include('site.header')

<div class="middle">

@include('components.sidebar')

    <div class="main-content">

        @include('components.content_top')

        <div class="content-middle">

            @include('components.content_head')

            <div class="cart-product-list">

                @if (!empty($data['cart']['items']))
                    @foreach( $data['cart']['items'] as $item )
                        <div class="cart-product-list__item">
                            <div class="cart-product__item__product-photo">
                                <img src="{{ $item['good']->image_url }}" class="cart-product__item__product-photo__image">
                            </div>
                            <div class="cart-product__item__product-name">
                                <div class="cart-product__item__product-name__content">
                                    <a href="{{ route('goodPage', ['good_id' => $item['good']->id]) }}">{{ $item['good']->title }}</a>
                                </div>
                            </div>
                            <div class="cart-product__item__cart-date">
                                <div class="cart-product__item__cart-date__content">{{ $item['count'] }}</div>
                            </div>
                            <div class="cart-product__item__product-price">
                                <span class="product-price__value">{{ $item['sum'] }} рублей</span>
                            </div>
                        </div>
                    @endforeach
                @endif



                <div class="cart-product-list__result-item">
                    <div class="cart-product-list__result-item__text">Итого</div>
                    <div class="cart-product-list__result-item__value">{{ $data['cart']['totals']['sum'] }} рублей</div>
                </div>
            </div>

            <h2>Ваши данные</h2>
            <form method="post" action="/cart/make-order">
                @csrf
                <div style="display:flex;justify-content: space-between">
                    <div style="width:50%;">
                        <strong>Ваш Email:</strong>:
                        <input type="email" name="email" class="search-container__form__input" required
                               style="border-radius: 10px;-webkit-border-radius: 10px;">
                    </div>
                    <div style="width:50%;">
                        <strong>Адрес доставки:</strong>:
                        <input type="text" name="address" class="search-container__form__input" required
                               style="border-radius: 10px;-webkit-border-radius: 10px;">
                    </div>
                </div>
                <div class="content-footer__container">
                    <div class="btn-buy-wrap">
                        <button type="submit" class="btn-buy-wrap__btn-link" style="cursor:pointer">Оформить заказ</button>
                    </div>
                </div>
            </form>


        </div>
        <div class="content-bottom"></div>
    </div>
</div>

@include('site.footer')
