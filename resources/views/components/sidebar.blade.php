<div class="sidebar">
    <div class="sidebar-item">
        <div class="sidebar-item__title">Категории</div>
        <div class="sidebar-item__content">
            <ul class="sidebar-category">
                @if (!empty($data['categories']))
                    @foreach ( $data['categories'] as $category )
                        <li class="sidebar-category__item"><a href="{{ route('categoryPage', ['category_id' => $category->id]) }}" class="sidebar-category__item__link">{{ $category->title }}</a></li>
                    @endforeach
                @endif
                @if (auth()->user()->isAdmin())
                    <li class="sidebar-category__item"><a href="{{ route('categoryPage', ['category_id' => 'new']) }}" class="sidebar-category__item__link" style="color:red;">Добавить</a></li>
                @endif
            </ul>
        </div>
    </div>
    <div class="sidebar-item">
        <div class="sidebar-item__title">Последние новости</div>
        <div class="sidebar-item__content">
            <div class="sidebar-news">
                @if (!empty($data['last_news']))
                    @foreach ( $data['last_news'] as $news )
                        <div class="sidebar-news__item">
                            <div class="sidebar-news__item__preview-news">
                                <a href="{{ route('newsPage', ['news_id' => $news->id]) }}" class="sidebar-news__item__title-news__link">
                                    <img src="{{ $news->image_url }}" alt="image-new" class="sidebar-new__item__preview-new__image">
                                </a>
                            </div>
                            <div class="sidebar-news__item__title-news">
                                <a href="{{ route('newsPage', ['news_id' => $news->id]) }}" class="sidebar-news__item__title-news__link">
                                    {{ $news->title }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
