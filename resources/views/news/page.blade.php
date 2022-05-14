@include('site.header')

<div class="middle">

@include('components.sidebar')

    <div class="main-content">

        @include('components.content_top')

        <div class="content-middle">

            @include('components.content_head')

            <div class="content-main__container">
                <div class="news-block content-text">
                    <h3 class="content-text__title">
                        {{ $data['news']->title }}
                    </h3>
                    <img src="{{ $data['news']->image_url }}" alt="Image" class="alignleft img-news">
                    <p>
                        {{ $data['news']->description }}
                    </p>
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
