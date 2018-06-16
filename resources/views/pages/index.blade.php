@extends('layouts.app')

@section('content')

    <div id="promo-section">
        <div class="main-slider">
            <div class="single-item">
                <div>
                    <a href="#" class="item">
                        <img src="/img/pilesos-camera-1000x343.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a href="#" class="item">
                        <img src="/img/zabil-pozdravit-1000x343-.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a href="#" class="item">
                        <img src="/img/pilesos-camera-1000x343.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a href="#" class="item">
                        <img src="/img/zabil-pozdravit-1000x343-.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a href="#" class="item">
                        <img src="/img/pilesos-camera-1000x343.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a href="#" class="item">
                        <img src="/img/zabil-pozdravit-1000x343-.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="promo-block">
            <img src="/img/210x400_8marta.png">
        </div>
    </div>


    <div class="tabs action-new">
        <input id="tab1" type="radio" name="tabs" checked>
        <label for="tab1" title="Вкладка 1">Акции</label>

        <input id="tab2" type="radio" name="tabs">
        <label for="tab2" title="Вкладка 2">Новинки</label>

        <input id="tab3" type="radio" name="tabs">
        <label for="tab3" title="Вкладка 3">Популярные товары</label>

        <section id="content-tab1">
            <div class="slick-carousel">
                @foreach ($actionProducts as $actionProduct)
                    <div class="item">
                        <a href="{{ $actionProduct->getUrl() }}"><img src="/img/image_small_300px.jpg" alt="" class="item-img"></a>
                        <div class="item-body">
                            @if( mb_strlen( $actionProduct->title ) > 80 )
                                <h3>{{ mb_substr( $actionProduct->title, 0, 80 ) . " ..." }}</h3>
                            @else
                                <h3>{{ $actionProduct->title }}</h3>
                            @endif
                            <div class="main-info">
                                <div class="buy-block">
                                    <div class="buy-block-list">
                                        <div class="price-block">
                                            {{--@if($relatedProduct->old_price)--}}
                                            {{--<span class="price price-old">{{ $relatedProduct->old_price }}<span> грн.</span></span>--}}
                                            {{--@endif--}}
                                            <span class="price price-new">{{ $actionProduct->price }}<span> грн.</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-btn">
                            <span class="compare"><i class="fa fa-exchange"></i></span>
                            <span class="like"><i class="fa fa-heart"></i></span>
                            <span class="buy add-to-cart" data-art="{{ $actionProduct->id }}"><i class="fa fa-shopping-basket"></i></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section id="content-tab2">
            <div class="slick-carousel">
                @foreach ($newProducts as $newProduct)
                    <div class="item">
                        <a href="{{ $newProduct->getUrl() }}"><img src="/img/img.jpg" alt="" class="item-img"></a>
                        <div class="item-body">
                            @if( mb_strlen( $newProduct->title ) > 80 )
                                <h3>{{ mb_substr( $newProduct->title, 0, 80 ) . " ..." }}</h3>
                            @else
                                <h3>{{ $newProduct->title }}</h3>
                            @endif
                            <div class="main-info">
                                <div class="buy-block">
                                    <div class="buy-block-list">
                                        <div class="price-block">
                                            {{--@if($relatedProduct->old_price)--}}
                                            {{--<span class="price price-old">{{ $relatedProduct->old_price }}<span> грн.</span></span>--}}
                                            {{--@endif--}}
                                            <span class="price price-new">{{ $newProduct->price }}<span> грн.</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="add-btn">
                            <span class="compare"><i class="fa fa-exchange"></i></span>
                            <span class="like"><i class="fa fa-heart"></i></span>
                            <span class="buy add-to-cart" data-art="{{ $newProduct->id }}"><i class="fa fa-shopping-basket"></i></span>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section id="content-tab3">

        </section>
    </div>

    <div class="advertise-area">
        <a href="#"><img src="/img/banner-home-content1.png" alt=""></a>
        <a href="#"><img src="/img/banner-home-content2.png" alt=""></a>
        <a href="#"><img src="/img/banner-home-content4.png" alt=""></a>
    </div>

    <section class="progress-steps">
        <h2>Как заказать товар на shop.ua</h2>
        <div class="steps">
            <div class="item">
                <i class="fa fa-desktop"></i>
                <p>Выберите понравившиеся товары и добавьте их в корзину</p>
            </div>
            <div class="item">
                <i class="fa fa-shopping-basket"></i>
                <p>Зайдите в корзину и нажмите кнопку "Оформить заказ"</p>
            </div>
            <div class="item">
                <i class="fa fa-file-text-o"></i>
                <p>Заполните все необходимые поля, выберите подходящий способ доставки и оплаты</p>
            </div>
            <div class="item">
                <i class="fa fa-money"></i>
                <p>Расплатитесь за покупку</p>
            </div>
            <div class="item">
                <i class="fa fa-archive"></i>
                {{--fa-truck--}}
                <p>Получите Ваш заказ</p>
            </div>
        </div>
    </section>

    <section class="news-block">
        <h2>Новости компании</h2>
        <div class="items">
            <div class="item">
                <div class="image"><img src="/img/banner-home-content1.png" alt=""></div>
                <p class="blog-date">19.02.2018</p>
                <p class="blog-title">График работы в праздничные дни</p>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                <a href="#" class="more">Читать далее...</a>
            </div>
            <div class="item">
                <div class="image"><img src="/img/banner-home-content2.png" alt=""></div>
                <p class="blog-date">19.02.2018</p>
                <p class="blog-title">График работы в праздничные дни</p>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                <a href="#" class="more">Читать далее...</a>
            </div>
            <div class="item">
                <div class="image"><img src="/img/banner-home-content3.png" alt=""></div>
                <p class="blog-date">19.02.2018</p>
                <p class="blog-title">График работы в праздничные дни</p>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                <a href="#" class="more">Читать далее...</a>
            </div>
            <div class="item">
                <div class="image"><img src="/img/banner-home-content3.png" alt=""></div>
                <p class="blog-date">19.02.2018</p>
                <p class="blog-title">График работы в праздничные дни</p>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                <a href="#" class="more">Читать далее...</a>
            </div>
        </div>
    </section>

    <section class="trademarks-slider">
        <h2>Бренды</h2>
        <div class="multiple-items">
            @foreach ($trademarks as $trademark)
                {{--<div>--}}
                    <a href="{{ route('trademark', $trademark->alias) }}" class="item">
                        <img src="/img/trademarks/{{ $trademark->logo }}" alt="">
                    </a>
                {{--</div>--}}
            @endforeach
            {{--<div>--}}
                {{--<a href="#" class="item">--}}
                    {{--<img src="/img/logo_danko_toys.png" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<a href="#" class="item">--}}
                    {{--<img src="/img/logo_duracell.png" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<a href="#" class="item">--}}
                    {{--<img src="/img/logo_olli_2.png" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<a href="#" class="item">--}}
                    {{--<img src="/img/logo_danko_toys.png" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<a href="#" class="item">--}}
                    {{--<img src="/img/logo_olli_2.png" alt="" class="item-img">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<a href="#" class="item">--}}
                    {{--<img src="/img/logo_duracell.png" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<a href="#" class="item">--}}
                    {{--<img src="/img/logo_economix.png" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<a href="#" class="item">--}}
                    {{--<img src="/img/logo_olli_2.png" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<a href="#" class="item">--}}
                    {{--<img src="/img/logo_leo.png" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<a href="#" class="item">--}}
                    {{--<img src="/img/logo_economix.png" alt="">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<a href="#" class="item">--}}
                    {{--<img src="/img/logo_leo.png">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<div>--}}
                {{--<a href="#" class="item">--}}
                    {{--<img src="/img/logo_economix.png">--}}
                {{--</a>--}}
                {{--<a href="{{ $relatedProduct->getUrl() }}" class="item">--}}
                {{--<img src="/img/Подилля.jpg" alt="" class="item-img">--}}
                {{--</a>--}}
            {{--</div>--}}

        </div>
    </section>

    <p class="main-description">Канцелярские товары, это то, без чего не может обойтись школьник, студент, офисный сотрудник, да в принципе, каждый второй
        человек. Канцтовары оптом обеспечат вам продуктивный рабочий процесс и комфортную учебу. Отдельного внимания достоин
        опт канцелярии для детей, здесь веселые альбомы и раскраски, маркеры и фломастеры, ручки с блестками и многое другое
        для развития. Также = качественная бумага, тетради и блокноты с оригинальным дизайном, дизайнерские ручки, папки для
        хранения документов, и другие канцелярские мелочи оптом по низким ценам. Все это делает вашу работу приятной, а главное,
        интересной. И параллельно представляет целую статью расходов для офисов и других учреждений. Но вам достаточно купить
        канцтовары в интернет магазине Paper-trade и наслаждаться процессом. Наш интернет магазин оптовой канцелярии предлагает
        широкий ассортимент товаров:
        Товары канцелярские для работы компании;
        Бумага различных видов и плотности; Личные канцелярские товары - планшеты и визитницы;
        Рaper-trade – это не только интернет магазин канцтоваров для школы оптом или бумага и ручки для офиса, это команда
        настоящих профессионалов, которая работает для своих покупателей, и делает все для того, чтобы вы смогли купить оптом
        канцелярские принадлежности высшего качества.
    </p>

@endsection