@include('site.header')

<div class="middle">

@include('components.sidebar')

    <div class="main-content">

        @include('components.content_top')

        <div class="content-middle">

            @include('components.content_head')

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
