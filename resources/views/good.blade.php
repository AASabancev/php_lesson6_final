@include('site.header')

<div class="middle">

    @include('components.sidebar')

    <div class="main-content">

        @include('components.content_top')

        <div class="content-middle">

            @include('components.content_head')
            @if (auth()->user()->isAdmin())
                <li class="sidebar-category__item">
                    <a href="{{ route('adminEditGood', ['good_id' => $data['good']->id ]) }}"
                       class="sidebar-category__item__link" style="padding: 0 10px; color:red;border-right: 2px solid #4c5f14;">Изменить товар</a>

                    <a href="{{ route('adminDeleteGood', ['good_id' => $data['good']->id ]) }}"
                       class="sidebar-category__item__link" style="padding: 0 10px; color:red;/*border-right: 2px solid #4c5f14;*/"
                    onclick="if(!confirm('Удалить товар безвозвратно?')) return false;">Удалить товар</a>
                </li>
            @endif

            <div class="content-main__container">
                <div class="product-container">
                    <div class="product-container__image-wrap">
                        <img src="{{ $data['good']->image_url }}" class="image-wrap__image-product">
                    </div>
                    <div class="product-container__content-text">
                        <div class="product-container__content-text__title">{{ $data['good']->title }}</div>
                        <div class="product-container__content-text__price">
                            <div class="product-container__content-text__price__value">
                                Цена: <b>{{ $data['good']->cost }}</b> руб
                            </div>
                            <a href="#" class="btn btn-blue j-tocart" data-good_id="{{ $data['good']->id }}">Купить</a>
                        </div>
                        <div class="product-container__content-text__description">
                            <p>
                                {{ $data['good']->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-bottom">
            <div class="line"></div>
            <div class="content-head__container">
                <div class="content-head__title-wrap">
                    <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
                </div>
            </div>
            <div class="content-main__container">
                <div class="products-columns">

                    @if (!empty($data['random_middle_goods']))
                        @foreach( $data['random_middle_goods'] as $good)
                            @include('components.product')
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@include('site.footer')
