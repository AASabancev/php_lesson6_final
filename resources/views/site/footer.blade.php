<footer class="footer">
    <div class="footer__footer-content">
        <div class="random-product-container">
            <div class="random-product-container__head">Случайный товар</div>
            <div class="random-product-container__content">

                <div class="item-product">
                    <div class="item-product__title-product">
                        <a href="{{ route('goodPage', ['good_id' => $data['random_good']->id]) }}" class="item-product__title-product__link">
                        {{ $data['random_good']->title }}
                        </a>
                    </div>
                    <div class="item-product__thumbnail">
                        <a href="{{ route('goodPage', ['good_id' => $data['random_good']->id]) }}" class="item-product__thumbnail__link">
                            <img src="{{ $data['random_good']->image_url }}" alt="Preview-image"
                                class="item-product__thumbnail__link__img">
                        </a>
                    </div>
                    <div class="item-product__description">
                        <div class="item-product__description__products-price">
                            <span class="products-price">{{ $data['random_good']->cost }} руб</span>
                        </div>
                        <div class="item-product__description__btn-block">
                            <a href="#" class="btn btn-blue j-tocart" data-good_id="{{ $data['random_good']->id }}">Купить</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="footer__footer-content__main-content">
            <p>
                {!! $data['settings']['footer_text']  !!}
            </p>
        </div>
    </div>
    <div class="footer__social-block">
        <ul class="social-block__list bcg-social">
            <li class="social-block__list__item">
                <a href="{{ $data['settings']['site_facebook']  }}" class="social-block__list__item__link"><i class="fa fa-facebook"></i></a>
            </li>
            <li class="social-block__list__item">
                <a href="{{ $data['settings']['site_twitter']  }}" class="social-block__list__item__link"><i class="fa fa-twitter"></i></a>
            </li>
            <li class="social-block__list__item">
                <a href="{{ $data['settings']['site_instagram']  }}" class="social-block__list__item__link"><i class="fa fa-instagram"></i></a>
            </li>
        </ul>
    </div>
</footer>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="/js/main.js"></script>
</body>
</html>
