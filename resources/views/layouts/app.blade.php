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
                    <li><img src="/img/shopika-logo-2-white.png" alt="" class="logo-img"></li>
                    @foreach ($menuCategory as $menu)
                        <li><a href="#">{{ $menu->title }}</a>
                            @if($menu->children)
                            <ul class="submenu-close">
                                @foreach ($menu->children as $childrenMenu)
                                    <li><a href="{{ url($childrenMenu->getUrl()) }}">{{ $childrenMenu->title }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                    @endforeach

                    <li class="login"><a href="#"><i class="fa fa-sign-in"></i> Войти</a></li>

                    @foreach ($mainMenu as $menu)
                        @if(Request::url() === url($menu->getUrl()))
                            <li><a class="active" href="{{ url($menu->getUrl()) }}">{{ $menu->title }}</a></li>
                        @else
                            <li><a href="{{ url($menu->getUrl()) }}">{{ $menu->title }}</a></li>
                        @endif
                    @endforeach
                </ul>
                <div id="mobile-bg"></div>
            </nav>
            <a href="#">
                <i class="fa fa-search"></i>
            </a>
        </div>
        <a href="/" class="logo"><img src="/img/shopika-logo-2-white.png" alt="" class=""></a>
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
                <ul id="#menu">
                    @foreach ($mainMenu as $menu)
                        @if(Request::url() === url($menu->getUrl()))
                            <li><a class="active" href="{{ url($menu->getUrl()) }}">{{ $menu->title }}</a></li>
                        @else
                            <li><a href="{{ url($menu->getUrl()) }}">{{ $menu->title }}</a></li>
                        @endif
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
        </div>

    </div>

    <div class="popup-basket" id="widget-cart-content">
        <p class="title">
            <span>Корзина</span>
            <span class="close" id="close-mobile-basket">Закрыть</span>
        </p>
        <p class="text">Ваша корзина пуста</p>
        {{--<span id="close-mobile-basket" class="icon-close"><i class="fa fa-times"></i></span>--}}
        {{--<p class="title">Корзина<a href="#" class="close" id="close-mobile-basket">Закрыть</a></p>--}}

        {{--<div id="widget-cart-content">--}}
            {{--Ваша корзина пуста--}}
        {{--</div>--}}
    </div>

    <div id="menu-fixed">
        <div class="case-upper-block">
        <div class="upper-block container">
            <nav class="base-nav catalog">
                <span class="humb-catalog btn wave left" id="humb-catalog">
                    {{--<i class="fa fa-bars"></i>--}}
                    Каталог товаров</span>
                <ul class="menu-catalog-close">
                    @foreach ($menuCategory as $menu)
                        {{--class="active"--}}
                        <li class="category-li"><a href="{{ url($menu->getUrl()) }}">{{ $menu->title }}<i class="fa fa-angle-right"></i></a>
                            <div class="mega-menu">
                                <p>{{ $menu->title }} ({{ count($menu->children) }})</p>
                                <ul>
                                    @foreach ($menu->children as $childrenMenu)
                                        <li><a href="{{ url($childrenMenu->getUrl()) }}">{{ $childrenMenu->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </nav>
            <div class="navbar-center">
                <a href="#" id="js-alphabet" class="btn wave alphabet"></a>
                <form method="GET" action="{{ route('search') }}" id="search" class="search-form">
                    <input type="text" class="search-input" name="query" value="{{ \Request::get('query') }}" placeholder="Поиск" required>
                    <span id="clear-search" class="search-clear"><i class="fa fa-times "></i></span>
                    <button type="submit" class="search-btn"><i class="fa fa-search top-nav-icon"></i></button>
                </form>
            </div>

            <div class="navbar-right">

                {{--<a href="#" class="" id="search">--}}
                {{--<i class="fa fa-search top-nav-icon"></i>--}}
                {{--</a>--}}
                <a href="#" class="btn wave left btn-menu exchange-btn">
                    <span>2</span>
                    {{--<i class="fa fa-exchange top-nav-icon"></i>--}}
                </a>
                <a href="#" class="btn wave left btn-menu heart-btn">
                    <span>2</span>
                    {{--<i class="fa fa-heart top-nav-icon"></i>--}}
                </a>
                <span href="#" id="js-office-head-btn" class="btn wave left btn-menu office-head-btn">
                    {{--<i class="fa fa-user top-nav-icon"></i>--}}
                </span>
                <div class="basket-icon">
                    <span class="count-basket btn wave left btn-menu shopping-basket-btn" id="basket">
                        <span>2</span>
                        {{--<i class="fa fa-shopping-basket top-nav-icon"></i>--}}
                    </span>
                </div>
                <ul class="private-office-head">
                    @if (Auth::guest())
                        @if(Request::url() === url("/login"))
                            <li><a class="active" href="{{ route('login') }}">Вход</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Вход</a></li>
                        @endif
                        @if(Request::url() === url("/register"))
                            <li><a class="active" href="{{ route('register') }}">Регистрация</a></li>
                        @else
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @endif
                    @else
                        <li><a href="#">Личные данные</a></li>
                        <li><a href="#">Корзина</a></li>
                        <li><a href="#">Желания</a></li><!--Избранное-->
                        <li><a href="#">Сравнение</a></li>
                        <li><a href="#">Мои заказы</a></li><!--История заказов-->
                        <li><a href="#">Мои отзывы</a></li>
                        <li><a href="#">Просмотренные товары</a></li>
                        <li><a href="#">Моя переписка</a></li>
                        <li><a href="{{ route('logout') }}">Выйти</a></li>
                    @endif
                </ul>
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

    <div class="mini-cart" id="mini-cart">

    </div>
</header>

<main class="main container">
    <div id="app">
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
                        @if(Request::url() === url($menu->getUrl()))
                            <li><a class="active" href="{{ url($menu->getUrl()) }}">{{ $menu->title }}</a></li>
                        @else
                            <li><a href="{{ url($menu->getUrl()) }}">{{ $menu->title }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </section>
            <section class="catalog">
                <h2>Каталог товаров</h2>
                <ul>
                    @foreach ($menuCategory as $menu)
                        @if(Request::url() === url($menu->getUrl()))
                            <li><a class="active" href="{{ url($menu->getUrl()) }}">{{ $menu->title }}</a></li>
                        @else
                            <li><a href="{{ url($menu->getUrl()) }}">{{ $menu->title }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </section>
            <section class="private-office">
                <h2>Личный кабинет</h2>
                <ul>
                @if (Auth::guest())
                        @if(Request::url() === url("/login"))
                            <li><a class="active" href="{{ route('login') }}">Вход</a></li>
                        @else
                            <li><a href="{{ route('login') }}">Вход</a></li>
                        @endif
                        @if(Request::url() === url("/register"))
                            <li><a class="active" href="{{ route('register') }}">Регистрация</a></li>
                        @else
                            <li><a href="{{ route('register') }}">Регистрация</a></li>
                        @endif
                @else
                        <li><a href="#">Личные данные</a></li>
                        <li><a href="#">Корзина</a></li>
                        <li><a href="#">Желания</a></li><!--Избранное-->
                        <li><a href="#">Сравнение</a></li>
                        <li><a href="#">Мои заказы</a></li><!--История заказов-->
                        <li><a href="#">Мои отзывы</a></li>
                        <li><a href="#">Просмотренные товары</a></li>
                        <li><a href="#">Моя переписка</a></li>
                        <li><a href="{{ route('logout') }}">Выйти</a></li>
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

@stack('scripts')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>