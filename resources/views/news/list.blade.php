@include('site.header')

<div class="middle">

@include('components.sidebar')

    <div class="main-content">

        @include('components.content_top')

        <div class="content-middle">

            @include('components.content_head')

            <div class="content-main__container">
                <div class="news-list__container">

                    @if (!empty($data['last_news']))
                        @foreach ( $data['last_news'] as $news )
                            <div class="news-list__item">
                                <div class="news-list__item__thumbnail">
                                    <a href="{{ route('newsPage', ['news_id' => $news->id]) }}">
                                        <img src="{{ $news->image_url }}">
                                    </a>
                                </div>
                                <div class="news-list__item__content">
                                    <a href="{{ route('newsPage', ['news_id' => $news->id]) }}"
                                       class="news-list__item__content__news-title"> {{ $news->title }}</a>
                                    <div class="news-list__item__content__news-date"> {{ $news->datetime->format('d.m.Y') }}</div>
                                    <div class="news-list__item__content__news-content">
                                        {{ \Illuminate\Support\Str::limit($news->description, 200) }}
                                    </div>
                                </div>
                                <div class="news-list__item__content__news-btn-wrap">
                                    <a href="{{ route('newsPage', ['news_id' => $news->id]) }}" class="btn btn-brown">Подробнее</a>
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
