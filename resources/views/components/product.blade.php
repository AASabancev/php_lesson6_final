<div class="products-columns__item">
    <div class="products-columns__item__title-product">
        <a href="{{ route('goodPage', ['good_id' => $good->id]) }}" class="products-columns__item__title-product__link">
            {{ $good->title }}
        </a>
    </div>
    <div class="products-columns__item__thumbnail">
        <a href="{{ route('goodPage', ['good_id' => $good->id]) }}" class="products-columns__item__thumbnail__link">
            <img src="{{ $good->image_url }}" alt="Preview-image"
                 class="products-columns__item__thumbnail__img">
        </a>
    </div>
    <div class="products-columns__item__description">
        <span class="products-price">{{ $good->cost }} руб</span>
        <a href="#" class="btn btn-blue j-tocart" data-good_id="{{ $good->id }}">
            Купить
        </a>
    </div>
</div>
