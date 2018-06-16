<!DOCTYPE html>
{{--<html lang="{{ app()->getLocale() }}">--}}
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page->getMetaTitle() }}</title>
    <meta name="description" content="{{ $page->getMetaDesc() }}">
    <meta name="keywords" content="{{ $page->getMetaKey() }}">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">


</head>
<body>

<header class="header">

    <div class="menu-mobile">

        <div class="left-icon-menu">
            <nav class="main-nav catalog">
                <span class="humb"></span>
                <ul class="menu-mb-close">
                    <li><img src="img/shopika-logo-2-white.png" alt="" class="logo-img"></li>
                    <li class="active"><a href="index.html">Бумага и бумажная продукция</a></li>
                    <li class=""><a href="#">Письменные принадлежности</a>
                        <ul class="submenu-close">
                            <li><a href="#">Готовальни и циркули (11)</a></li>
                            <li><a href="#">Карандаши механические (14)</a></li>
                            <li><a href="#">Карандаши простые (14)</a></li>
                            <li><a href="#">Корректоры (14)</a></li>
                            <li><a href="#">Ластики (148)</a></li>
                            <li><a href="#">Линейки (18)</a></li>
                            <li><a href="#">Маркеры (14)</a></li>
                            <li><a href="#">Ручки (14)</a></li>
                            <li><a href="#">Ручки перьевые (70)</a></li>
                            <li><a href="#">Стержни для мех.карандашей (12)</a></li>
                            <li><a href="#">Стержни для ручек (14)</a></li>
                            <li><a href="#">Стержни для циркуля (14)</a></li>
                            <li><a href="#">Точилки (35)</a></li>
                            <li><a href="#">Тушь (11)</a></li>
                            <li><a href="#">Футляры для ручек (14)</a></li>
                            <li><a href="#">Чернила (14)</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Офисные принадлежности</a></li>
                    <li><a href="#">Делопроизводство и архивация</a></li>
                    <li><a href="#">Настольные принадлежности</a></li>
                    <li><a href="#">Школьная продукция</a></li>
                    <li><a href="#">Текстиль</a></li>
                    <li><a href="#">Творчество и развитие</a></li>
                    <li><a href="#">Штемпельная продукция</a></li>
                    <li><a href="#">Книги</a></li>
                    <li><a href="#">Игры и игрушки</a></li>
                    <li><a href="#">Подарки и сувениры</a></li>
                    <li><a href="#">Сопутствующие товары</a></li><li><a href="#">Офисные принадлежности</a></li>
                    <li><a href="#">Делопроизводство и архивация</a></li>
                    <li><a href="#">Настольные принадлежности</a></li>
                    <li><a href="#">Школьная продукция</a></li>
                    <li><a href="#">Текстиль</a></li>
                    <li><a href="#">Творчество и развитие</a></li>
                    <li><a href="#">Штемпельная продукция</a></li>
                    <li><a href="#">Книги</a></li>
                    <li><a href="#">Игры и игрушки</a></li>
                    <li><a href="#">Подарки и сувениры</a></li>
                    <li><a href="#">Сопутствующие товары</a></li>

                    <li class="login"><a href="#"><i class="fa fa-sign-in"></i> Войти</a></li>

                    <li><a href="index.html">Главная</a></li>
                    <li><a href="#">Каталог товаров</a></li>
                    <li><a href="#">Прайс</a></li>
                    <li><a href="#">Торговые марки</a></li>
                    <li><a href="#">Акции</a></li>
                    <li><a href="#">Новинки</a></li>
                    <li><a href="#">Оплата</a></li>
                    <li><a href="#">Доставка</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a href="#">Карта сайта</a></li>
                </ul>
                <div id="mobile-bg"></div>
            </nav>
            <a href="#">
                <i class="fa fa-search"></i>
            </a>
        </div>
        <a href="/" class="logo"><img src="img/shopika-logo-2-white.png" alt="" class=""></a>
        <ul class="icon-menu">
            <li>
                <a href="#" class="">
                    <i class="fa fa-user"></i>
                </a>
            </li>
            <li id="mobile-basket">
                <a href="#" class="">
                    <i class="fa fa-shopping-basket"></i>
                </a>
            </li>
        </ul>
        <div class="mobile-popup-basket basket" id="mb-popup-basket">
            <p class="title">Корзина<a href="#" class="close">Закрыть</a></p>

            <div class="popup-basket-body">
                <div class="item">
                    <span class="icon-close"><i class="fa fa-times"></i></span>
                    <div class="item-info">
                        <img src="img/img.jpg" alt=""> <!--class="img-product-basket"-->
                        <div class="info">
                            <a class="product-name">Карандаши восковые 12 цв. "Fresh Ideas" CoolForSchool, CF60706</a>
                            <p class="trademark"><span>ТМ:</span> CoolForSchool</p>
                            <div class="price-quantity-block">
                                <div class="price-block">
                                    <span class="price price-old">15785,58 грн.</span>
                                    <span class="price price-new">15651,18 грн.</span>
                                </div>
                                <span class="quantity">
                                    <span class="less"><i class="fa fa-angle-down"></i></span>
                                    <input type="text" name="" value="1205000" maxlength="7">
                                    <span class="more"><i class="fa fa-angle-up"></i></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <p class="item-total">157953,65 грн.</p>
                </div>

                <div class="item">
                    <span class="icon-close"><i class="fa fa-times"></i></span>
                    <div class="item-info">
                        <img src="img/img.jpg"> <!--class="img-product-basket"-->
                        <div class="info">
                            <a class="product-name">Карандаши восковые 12 цв. "Fresh Ideas" ffffebdtgtgdd CoolForSchool, CF60706</a>
                            <p class="trademark"><span>ТМ:</span> CoolForSchool</p>
                            <div class="price-quantity-block">
                                <div class="price-block">
                                    <span class="price price-new">1561,18 грн.</span>
                                </div>
                                <span class="quantity">
                                    <span class="less"><i class="fa fa-angle-down"></i></span>
                                    <input type="text" name="" value="120000" maxlength="7">
                                    <span class="more"><i class="fa fa-angle-up"></i></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <p class="item-total">15793,65 грн.</p>
                </div>
                <div class="item">
                    <span class="icon-close"><i class="fa fa-times"></i></span>
                    <div class="item-info">
                        <img src="img/img.jpg"> <!--class="img-product-basket"-->
                        <div class="info">
                            <a class="product-name">Карандаши восковые 12 цв. "Fresh Ideas" ffffebdtgtgdd CoolForSchool, CF60706676</a>
                            <p class="trademark"><span>ТМ:</span> CoolForSchool</p>
                            <div class="price-quantity-block">
                                <div class="price-block">
                                    <span class="price price-new">1,18 грн.</span>
                                </div>
                                <span class="quantity">
                                    <span class="less"><i class="fa fa-angle-down"></i></span>
                                    <input type="text" name="" value="12" maxlength="7">
                                    <span class="more"><i class="fa fa-angle-up"></i></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <p class="item-total">15,65 грн.</p>
                </div>

            </div>

            <div class="popup-basket-footer">
                <div class="total-result">
                    <p>Общая сумма:</p>
                    <p>152939,6 грн.</p>
                </div>
                <div class="btn-actions">
                    <a href="#" class="btn btn-edit-basket">Редактировать корзину</a>
                    <a href="#" class="btn btn-make-order">Оформить заказ</a>
                </div>
            </div>
        </div>

        <!--<div class="item">-->
        <!--<span class="status st-stock">Акция</span>-->
        <!--<img src="img/img.jpg">-->
        <!--<p class="product-code">Код товара: 16839</p>-->
        <!--<p class="trademark">ТМ: CoolForSchool</p>-->
        <!--<span class="available"></span>-->
        <!--<h3><a class="">Карандаши восковые 12 цв. "Fresh Ideas", CoolForSchool, CF60706</a></h3>-->
        <!--<div class="price-block">-->
        <!--<span class="price price-old">1578,58 грн.</span>-->
        <!--<span class="price price-new">1561,18 грн.</span>-->
        <!--</div>-->
        <!--<span class="quantity">-->
        <!--<span class="less"><i class="fa fa-angle-down"></i></span>-->
        <!--<input type="text" name="" class="checkbox" value="120000" id="" maxlength="7">-->
        <!--<span class="more"><i class="fa fa-angle-up"></i></span>-->
        <!--</span>-->
        <!--<p class="total">15793,65 грн.</p>-->
        <!--<div class="add-btn">-->
        <!--<span class="compare"><i class="fa fa-exchange"></i></span>-->
        <!--<span class="like"><i class="fa fa-heart"></i></span>-->
        <!--<span class="buy"><i class="fa fa-shopping-basket"></i>Купить</span>-->
        <!--</div>-->
        <!--<p class="minimum">Минимальное количество для заказа - 36 шт.</p>-->
        <!--<p>Количество в упаковке: 24 шт.</p>-->
        <!--<p>Количество в ящике: 288 шт.</p>-->
        <!--</div>-->

    </div>

    <div class="container">
        <div class="header-top">
            <nav>
                <ul>
                    @foreach ($mainMenu as $menu)
                        <li><a href="{{ url($menu->getUrl()) }}">{{ $menu->title }}</a></li>
                    @endforeach
                </ul>
            </nav>
            <div class="language">
                <a href="#" class="active">RU</a>
                <span>|</span>
                <a href="#">UA</a>
            </div>
        </div>
        <div class="header-bottom">
            <div class="working-hours-phones">
                <span>(+38) 063 422 4995</span>
                <span>(+38) 063 422 4995</span>
                <p>Ежедневно с 9:00 - 20:00</p>
            </div>
            <div class="logo">
                <h1>МегаКанц</h1>
                <a href="/"><img src="/img/shopika-logo-2-white_2.png" alt=""></a>
            </div>
            <div class="communication">
                <div class="email">
                    <p>kh.kanc2017@gmail.com</p>
                </div>
                {{--<div class="social-network">--}}
                    {{--<p>Мы в социальных сетях:</p>--}}
                <ul class="social-icons">
                    <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fa fa-vk"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    {{--<li><a href="#"><i class="fa fa-viber"></i></a></li>--}}
                    <li><a href="#"><i class="fa fa-odnoklassniki"></i></a></li>
                </ul>
                {{--</div>--}}
            </div>
            {{--<div class="working-hours">--}}
                {{--<p>Время работы:</p>--}}
                {{--<p>Пн-Пт: 9:00 - 18:00</p>--}}
                {{--<p>Сб: 9:00 - 16:00</p>--}}
                {{--<p>Вс - выходной</p>--}}
            {{--</div>--}}
            {{--<div class="phones">--}}
                {{--<p>Заказы по телефонам:</p>--}}
                {{--<p>(+38) 063 422 4995</p>--}}
                {{--<p>(+38) 063 422 4995</p>--}}
                {{--<p>(+38) 063 422 4995</p>--}}
            {{--</div>--}}
        </div>

    </div>

    <div id="menu-fixed">
        <div class="case-upper-block">
        <div class="upper-block container">
            <nav class="base-nav catalog">
                <span class="humb-catalog btn wave left" id="humb-catalog"><i class="fa fa-bars"></i>Каталог товаров</span>
                <ul class="menu-catalog-close">
                    @foreach ($menuCategory as $menu)
                        {{--class="active"--}}
                        <li class="category-li"><a href="{{ url($menu->getUrl()) }}">{{ $menu->title }}</a><i class="fa fa-angle-right"></i>
                            <div class="mega-menu">
                                <p>{{ $menu->title }}</p>
                                <ul>
                                    @foreach ($menu->children as $childrenMenu)
                                        <li><a href="{{ url($childrenMenu->getUrl()) }}">{{ $childrenMenu->title }}</a></li>
                                    @endforeach
                                    {{--<li><a href="#">Готовальни и циркули</a></li>--}}
                                    {{--<li><a href="#">Карандаши механические</a></li>--}}
                                    {{--<li><a href="#">Карандаши простые</a></li>--}}
                                    {{--<li><a href="#">Корректоры</a></li>--}}
                                    {{--<li><a href="#">Ластики</a></li>--}}
                                    {{--<li><a href="#">Линейки</a></li>--}}
                                    {{--<li><a href="#">Маркеры</a></li>--}}
                                    {{--<li><a href="#">Ручки</a></li>--}}
                                    {{--<li><a href="#">Ручки перьевые</a></li>--}}
                                    {{--<li><a href="#">Стержни для мех.карандашей</a></li>--}}
                                    {{--<li><a href="#">Стержни для ручек</a></li>--}}
                                    {{--<li><a href="#">Стержни для циркуля</a></li>--}}
                                    {{--<li><a href="#">Точилки</a></li>--}}
                                    {{--<li><a href="#">Тушь</a></li>--}}
                                    {{--<li><a href="#">Футляры для ручек</a></li>--}}
                                    {{--<li><a href="#">Чернила)</a></li>--}}
                                    {{--<li><a href="#">Стержни для мех.карандашей</a></li>--}}
                                    {{--<li><a href="#">Стержни для ручек</a></li>--}}
                                    {{--<li><a href="#">Стержни для циркуля</a></li>--}}
                                    {{--<li><a href="#">Футляры для ручек</a></li>--}}
                                    {{--<li><a href="#">Чернила</a></li>--}}
                                    {{--<li><a href="#">Стержни для мех.карандашей</a></li>--}}
                                    {{--<li><a href="#">Стержни для ручек</a></li>--}}
                                    {{--<li><a href="#">Стержни для циркуля</a></li>--}}
                                    {{--<li><a href="#">Футляры для ручек</a></li>--}}
                                    {{--<li><a href="#">Чернила</a></li>--}}
                                    {{--<li><a href="#">Стержни для мех.карандашей</a></li>--}}
                                    {{--<li><a href="#">Стержни для ручек</a></li>--}}
                                    {{--<li><a href="#">Стержни для циркуля</a></li>--}}
                                    {{--<li><a href="#">Футляры для ручек</a></li>--}}
                                    {{--<li><a href="#">Чернила</a></li>--}}
                                    {{--<li><a href="#">Стержни для мех.карандашей</a></li>--}}
                                    {{--<li><a href="#">Стержни для ручек</a></li>--}}
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <div class="navbar-center">
                {{--<form action="" class="radio-state">--}}
                    {{--<p><input type="radio" name="product" value="" checked> Товары в наличии</p>--}}
                    {{--<p><input type="radio" name="product" value=""> Весь ассортимент</p>--}}
                {{--</form>--}}
                {{--<a href="#" class="">Акции</a>--}}
                {{--<a href="#" class="">Новинки</a>--}}
                <a href="#" class="btn wave alphabet">
                    {{--<i class="fa fa-user top-nav-icon"></i>--}}
                </a>
                <form method="GET" action="{{ route('search') }}" class="search-form">
                    <input id="search" type="text" class="search-input" name="query" value="{{ \Request::get('query') }}" placeholder="Поиск" required>
                    <button type="submit" class="search-btn"><i class="fa fa-search top-nav-icon"></i></button>
                </form>
            </div>

            <div class="navbar-right">

                {{--<a href="#" class="" id="search">--}}
                {{--<i class="fa fa-search top-nav-icon"></i>--}}
                {{--</a>--}}
                <a href="#" class="btn wave left">
                    <span>2</span>
                    <i class="fa fa-exchange top-nav-icon"></i>
                </a>
                <a href="#" class="btn wave left">
                    <span>2</span>
                    <i class="fa fa-heart top-nav-icon"></i>
                </a>
                <a href="#" class="btn wave left">
                    <i class="fa fa-user top-nav-icon"></i>
                </a>
                <div class="basket-icon">
                    <a href="#" class="count-basket btn wave left">
                        <span>2</span>
                        <i class="fa fa-shopping-basket top-nav-icon"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="container">
            <ul class="lower-block"><!-- alphabet -->
                <li class="letter"><a href="#" class="">А</a></li>
                <li class="letter"><a href="#" class="">Б</a></li>
                <li class="letter"><a href="#" class="">В</a></li>
                <li class="letter"><a href="#" class="">Г</a></li>
                <li class="letter"><a href="#" class="">Д</a></li>
                <li class="letter"><a href="#" class="">Е</a></li>
                <li class="letter"><a href="#" class="">З</a></li>
                <li class="letter"><a href="#" class="">И</a></li>
                <li class="letter"><a href="#" class="">К</a>
                    {{--<div class="a">--}}
                        <ul class="alphabet-close">
                            <li><a href="#" class="">Календари</a></li>
                            <li><a href="#" class="">Калькуляторы</a></li>
                            <li><a href="#" class="">Канцелярский набор</a></li>
                            <li><a href="#" class="">Карандаш строительный</a></li>
                            <li><a href="#" class="">Карандаши восковые</a></li>
                            <li><a href="#" class="">Карандаши механические</a></li>
                            <li><a href="#" class="">Карандаши простые</a></li>
                            <li><a href="#" class="">Карандаши цветные</a></li>
                            <li><a href="#" class="">Картины "Нарисуй сам"</a></li>
                            <li><a href="#" class="">Карты игральные</a></li>
                            <li><a href="#" class="">Квиллинг</a></li>
                            <li><a href="#" class="">Кинетический песок</a></li>
                            <li><a href="#" class="">Кисточки</a></li>
                            <li><a href="#" class="">Клей</a></li>
                            <li><a href="#" class="">Книга кулинарная</a></li>
                            <li><a href="#" class="">Книги</a></li>
                            <li><a href="#" class="">Кнопки</a></li>
                            <li><a href="#" class="">Конверты бумажные</a></li>
                            <li><a href="#" class="">Конверты подарочные</a></li>
                            <li><a href="#" class="">Конфетти для творчества</a></li>
                            <li><a href="#" class="">Корректор</a></li>
                            <li><a href="#" class="">Краски</a></li>
                        </ul>
                    {{--</div>--}}
                </li>
                <li class="letter"><a href="#" class="">Л</a>
                    <ul class="alphabet-close">
                        <li><a href="#" class="">Календари</a></li>
                        <li><a href="#" class="">Калькуляторы</a></li>
                        <li><a href="#" class="">Канцелярский набор</a></li>
                        <li><a href="#" class="">Карандаш строительный</a></li>
                        <li><a href="#" class="">Карандаши восковые</a></li>
                        <li><a href="#" class="">Карандаши механические</a></li>
                        <li><a href="#" class="">Карандаши простые</a></li>
                        <li><a href="#" class="">Карандаши цветные</a></li>
                    </ul>
                </li>
                <li class="letter"><a href="#" class="">М</a>
                    <ul class="alphabet-close">
                        <li><a href="#" class="">Календари</a></li>
                        <li><a href="#" class="">Калькуляторы</a></li>
                    </ul>
                </li>
                <li class="letter"><a href="#" class="">Н</a>
                    <ul class="alphabet-close">
                        <li><a href="#" class="">Календари</a></li>
                    </ul>
                </li>
                <li class="letter"><a href="#" class="">О</a>
                    <ul class="alphabet-close">
                        <li><a href="#" class="">Календари</a></li>
                        <li><a href="#" class="">Календари</a></li>
                        <li><a href="#" class="">Календари</a></li>
                    </ul>
                </li>
                <li class="letter"><a href="#" class="">П</a>
                    <ul class="alphabet-close">
                        <li><a href="#" class="">Календари</a></li>
                        <li><a href="#" class="">Календари</a></li>
                        <li><a href="#" class="">Календари</a></li>
                        <li><a href="#" class="">Календари</a></li>
                    </ul>
                </li>
                <li class="letter"><a href="#" class="">Р</a>
                    <ul class="alphabet-close">
                        <li><a href="#" class="">Календари</a></li>
                        <li><a href="#" class="">Календари</a></li>
                        <li><a href="#" class="">Календари</a></li>
                        <li><a href="#" class="">Календари</a></li>
                        <li><a href="#" class="">Календари</a></li>
                    </ul>
                </li>
                <li class="letter"><a href="#" class="">С</a></li>
                <li class="letter"><a href="#" class="">Т</a></li>
                <li class="letter"><a href="#" class="">У</a></li>
                <li class="letter"><a href="#" class="">Ф</a></li>
                <li class="letter"><a href="#" class="">Х</a></li>
                <li class="letter"><a href="#" class="">Ц</a></li>
                <li class="letter"><a href="#" class="">Ч</a></li>
                <li class="letter"><a href="#" class="">Ш</a></li>
            </ul>
        </div>
        </div>

    </div>

</header>

<main class="main container">

    <div id="app">
        {{--<nav class="navbar navbar-default navbar-static-top">--}}
            {{--<div class="container">--}}
                {{--<div class="navbar-header">--}}

                    {{--<!-- Collapsed Hamburger -->--}}
                    {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">--}}
                        {{--<span class="sr-only">Toggle Navigation</span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                        {{--<span class="icon-bar"></span>--}}
                    {{--</button>--}}

                    {{--<!-- Branding Image -->--}}
                    {{--<a class="navbar-brand" href="{{ url('/') }}">--}}
                        {{--{{ config('app.name', 'Laravel') }}--}}
                    {{--</a>--}}
                {{--</div>--}}

                {{--<div class="collapse navbar-collapse" id="app-navbar-collapse">--}}
                    {{--<!-- Left Side Of Navbar -->--}}
                    {{--<ul class="nav navbar-nav">--}}
                        {{--@foreach ($mainMenu as $menu)--}}
                            {{--<li><a href="{{ url($menu->getUrl()) }}">{{ $menu->title }}</a></li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}

                    {{--<!-- Right Side Of Navbar -->--}}
                    {{--<ul class="nav navbar-nav navbar-right">--}}
                        {{--<!-- Authentication Links -->--}}
                        {{--@if (Auth::guest())--}}
                            {{--<li><a href="{{ route('login') }}">Вход</a></li>--}}
                            {{--<li><a href="{{ route('register') }}">Регистрация</a></li>--}}
                        {{--@else--}}
                            {{--<li class="dropdown">--}}
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                {{--</a>--}}

                                {{--<ul class="dropdown-menu" role="menu">--}}
                                    {{--<li>--}}
                                        {{--<a href="{{ route('logout') }}"--}}
                                            {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                            {{--Logout--}}
                                        {{--</a>--}}

                                        {{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
                                            {{--{{ csrf_field() }}--}}
                                        {{--</form>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--@endif--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</nav>--}}
        {{--<nav>--}}
            {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
                {{--<ul class="nav navbar-nav">--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Каталог <b class="caret"></b></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--@foreach ($menuCategory as $menu)--}}
                                {{--<li>--}}
                                    {{--<a href="{{ url($menu->getUrl()) }}">{{ $menu->title }}</a>--}}
                                    {{--<ul style="margin-left: 30px">--}}
                                        {{--@foreach ($menu->children as $childrenMenu)--}}
                                            {{--<li><a href="{{ url($childrenMenu->getUrl()) }}">{{ $childrenMenu->title }}</a></li>--}}
                                        {{--@endforeach--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</nav>--}}

        @yield('content')
    </div>
</main>
<footer class="footer">
    <div class="subscription-bg">
        <div class="subscription container">
            <p class="title">Узнавай первым об акциях и новинках !</p>
            <form action="#">
                <input id="" type="email" class="form-control" name="email" value="" >
                <button type="submit" class="btn wave left">Подписаться на рассылку</button>
                {{--<button data-ripple>--}}
                    {{--Demo button 1--}}
                {{--</button>--}}
                {{--class="btn btn-primary"--}}
            </form>

        </div>
    </div>
    <div class="footer-bg">
        <div class="footer-main container">
            <section class="menu">
                <h2>Меню</h2>
                <ul>
                    @foreach ($mainMenu as $menu)
                        <li><a href="{{ url($menu->getUrl()) }}">{{ $menu->title }}</a></li>
                    @endforeach
                </ul>
            </section>
            <section class="catalog">
                <h2>Каталог товаров</h2>
                <ul>
                    @foreach ($menuCategory as $menu)
                        {{--class="active"--}}
                        <li><a href="{{ url($menu->getUrl()) }}">{{ $menu->title }}</a></li>
                    @endforeach
                </ul>
            </section>
            <section class="private-office">
                <h2>Личный кабинет</h2>
                <ul>
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Вход</a></li>
                    <li><a href="{{ route('register') }}">Регистрация</a></li>
                @else
                        <li><a href="#">Корзина</a></li>
                        <li><a href="#">История заказов</a></li>
                        <li><a href="#">Избранное</a></li>
                        <li><a href="#">Персональные данные</a></li>
                @endif
                </ul>
            </section>
            <section class="contacts-info">
                <h2>Контактная информация</h2>
                <ul class="info">
                    <li class="location"><p>г. Харьков</p></li>
                    <li class="phone-numbers">
                        <p>(+38) 063 422 4995</p>
                        <p>(+38) 063 422 4995</p>
                        <p>(+38) 063 422 4995</p>
                    </li>
                    <li class="working-hours">
                        <p>Время работы:</p>
                        <p>Пн-Пт: 9:00 - 18:00</p>
                        <p>Сб: 9:00 - 16:00</p>
                    </li>
                    <li class="email"><p>admin@bootexperts.com</p></li>
                </ul>
                <ul class="social-icons">
                    <li>
                        <a href="#" class="">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="">
                            <i class="fa fa-vk"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            {{--<i class="fa fa-viber"></i>--}}
                            <i class="fa fa-youtube"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-odnoklassniki"></i>
                        </a>
                    </li>
                </ul>
            </section>
        </div>
        <p class="copyright"> © 2015—2018 Компания «Мегаканц» — канцтовары по оптовым ценам </p>
    </div>
</footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>