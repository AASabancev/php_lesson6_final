<!DOCTYPE html>
<html lang="ru">
<head>
    <title>{{ $data['page_title'] }} - ГеймсМаркет</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="/css/libs.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/media.css">
</head>
<body>
<div class="main-wrapper">
    <header class="main-header">
        <div class="logotype-container">
            <a href="/" class="logotype-link">
                <img src="/img/logo.png" alt="Логотип">
            </a>
        </div>
        <nav class="main-navigation">
            <ul class="nav-list">
                <li class="nav-list__item"><a href="{{ route('indexPage') }}" class="nav-list__item__link">Главная</a></li>
                <li class="nav-list__item"><a href="{{ route('ordersListPage') }}" class="nav-list__item__link">Мои заказы</a></li>
                <li class="nav-list__item"><a href="{{ route('newsListPage') }}" class="nav-list__item__link">Новости</a></li>
                <li class="nav-list__item"><a href="{{ route('aboutPage') }}" class="nav-list__item__link">О компании</a></li>
                @if (auth()->user()->isAdmin())
                    <li class="nav-list__item"><a href="{{ route('adminSettings') }}" class="nav-list__item__link">Настройки</a></li>
                @endif
            </ul>
        </nav>
        <div class="header-contact">
            <div class="header-contact__phone"><a href="tel:{{ $data['settings']['site_phone']  }}" class="header-contact__phone-link">Телефон: {{ $data['settings']['site_phone']  }}</a>
            </div>
        </div>
        <div class="header-container">
            <div class="payment-container">
                <div class="payment-basket__status">
                    <div class="payment-basket__status__icon-block">
                        <a href="{{ route('cartPage') }}" class="payment-basket__status__icon-block__link">
                            <i class="fa fa-shopping-basket"></i>
                        </a>
                    </div>
                    <div class="payment-basket__status__basket">
                        <span class="payment-basket__status__basket-value j-cart-count">{{ $data['cart_count'] }}</span>
                        <span class="payment-basket__status__basket-value-descr">товаров</span></div>
                </div>
            </div>
            <div class="authorization-block">
                @auth
                    <a href="{{ route('logout') }}" class="authorization-block__link">Выйти</a>
                @else
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="authorization-block__link">Регистрация</a>
                @endif
                <a href="{{ route('login') }}" class="authorization-block__link">Войти</a>
                @endauth
            </div>
        </div>
    </header>
