@include('site.header')

<div class="middle">

    @include('components.sidebar')

    <div class="main-content">

        @include('components.content_top')

        <div class="content-middle">

            @include('components.content_head')

            @if (auth()->user()->isAdmin())
                <li class="sidebar-category__item">

                    <a href="{{ route('adminAddGood', ['category_id' => $data['category_id']]) }}"
                       class="sidebar-category__item__link" style="padding: 0 10px; color:red;border-right: 2px solid #4c5f14;">Добавить товар</a>

                    <a href="{{ route('adminCategory', ['category_id' => $data['category_id']]) }}"
                       class="sidebar-category__item__link" style="padding: 0 10px; color:red;border-right: 2px solid #4c5f14;">Изменить раздел</a>

                    <a href="{{ route('adminDeleteCategory', ['category_id' => $data['category_id'] ]) }}"
                       class="sidebar-category__item__link" style="padding: 0 10px; color:red;/*border-right: 2px solid #4c5f14;*/"
                       onclick="if(!confirm('Удалить товар безвозвратно?')) return false;">Удалить раздел</a>


                </li>
            @endif

            @if($data['category']->description)
                <p>
                    {{ $data['category']->description }}
                </p>
            @endif

            <div class="content-main__container">
                <div class="products-columns">


                    @if (!empty($data['goods']))
                        @foreach( $data['goods'] as $good)
                            @include('components.product')
                        @endforeach
                    @endif
                </div>
            </div>

            @include('components.pagination')

        </div>
        <div class="content-bottom"></div>
    </div>
</div>

@include('site.footer')
