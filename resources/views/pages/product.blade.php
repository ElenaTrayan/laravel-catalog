@extends('layouts.app')

@section('content')

    <div class="breadcrumbs-views">
        <ol class="breadcrumbs">
            @if($page->category->parent)
                @if($page->category->parent->parent)
                    <li><a href="{{ $page->category->parent->parent->getUrl() }}">{{ $page->category->parent->parent->title }}</a></li>
                @endif
                <li><a href="{{ $page->category->parent->getUrl() }}">{{ $page->category->parent->title }}</a></li>
            @endif
            <li><a href="{{ $page->category->getUrl() }}">{{ $page->category->title }}</a></li>
            <li>{{ $page->title }}</li>
        </ol>
    </div>

    <div class="page-product">
        <div class="left-block">
            {{--<img src="/img/img.jpg" alt="">--}}
            <div class="product-slider">
                <div>
                    <a href="#" class="item">
                        <img src="/img/image_small_300px.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a href="#" class="item">
                        <img src="/img/img.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a href="#" class="item">
                        <img src="/img/image_small_300px.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a href="#" class="item">
                        <img src="/img/img.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a href="#" class="item">
                        <img src="/img/image_small_300px.jpg" alt="">
                    </a>
                </div>
                <div>
                    <a href="#" class="item">
                        <img src="/img/img.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="right-block">
            <div class="info item">
                <h2>{{ $page->title }}</h2>
                <div class="available-info">
                    <span>Наличие: <span class="available">{{ \App\Models\Product::$states[$page->state]}}</span></span>
                    <div class="status">
                        @if($page->new)
                            <span class="st-new">{{ \App\Models\Product::$new[$page->new]}}</span>
                        @endif
                        @if($page->action)
                            <span class="st-stock">{{ \App\Models\Product::$action[$page->action]}}</span>
                        @endif
                    </div>
                </div>
                <div class="other-info">
                    <p class="product-code">Код товара: <span>{{ $page->code }}</span></p>
                    @if($page->trademark)
                        <p class="trademark">ТМ: <span>{{ $page->trademark->title}}</span></p>
                    @endif
                </div>
                <table class="basket-item">
                    @if($page->old_price)
                        <tr><td class="first-col">Цена:</td><td><span class="price price-old"> {{ $page->old_price }}<span> грн.</span></span></td></tr>
                        <tr><td class="first-col">Цена со скидкой:</td><td><span class="price price-new price-here">{{ $page->price }}<span> грн.</span></span></td></tr>
                    @else
                        <tr><td class="first-col">Цена:</td><td><span class="price price-new price-here">{{ $page->price }}</span><span>грн.</span></td></tr>
                    @endif
                    <tr class="tr-quantity">
                        <td class="first-col">Количество:</td>
                        <td>
                        <span class="quantity">
                            <span class="less"><i class="fa fa-angle-down"></i></span>
                            <input type="text" name="" class="checkbox" value="{{ $page->minimal }}" id="" maxlength="7">
                            <span class="more"><i class="fa fa-angle-up"></i></span>
                        </span>
                        </td>
                    </tr>
                    <tr><td class="first-col">Общая стоимость:</td><td><span class="total">15793,65</span><span> грн.</span></td></tr>
                </table>
                {{--Кнопки должны чем-то отличаться друг от друга, поэтому в качестве атрибута (назвали data-art) к кнопке пропишем Код товара--}}
                <span class="buy add-to-cart" data-art="{{ $page->id }}"><i class="fa fa-shopping-basket"></i>Купить</span>
                <div class="add-btn">
                    <span class="compare"><i class="fa fa-exchange"></i>Сравнить</span>
                    <span class="like"><i class="fa fa-heart"></i>В избранное</span>
                </div>

                {{--<p class="packaging">Количество в упаковке: <span>24 шт.<span></p>--}}
                {{--<p class="description">Корпус карандаша изготовлен из древесины высокого класса. Грифель карандаша изготавливается по специальной технологии, обеспечивая мягкое и равномерное нанесение рисунка на бумагу. Грифель идеально отцентрован в корпусе, при заточке не крошится и не ломается.</p>--}}
            </div>
        </div>
    </div>
    <div class="product-info">
        <div class="left-block">
            <div class="tabs properties">
                <input id="tab1" type="radio" name="tabs" checked>
                <label for="tab1" title="Вкладка 1">Описание</label>

                <input id="tab2" type="radio" name="tabs">
                <label for="tab2" title="Вкладка 2">Характеристики</label>

                <input id="tab3" type="radio" name="tabs">
                <label for="tab3" title="Вкладка 3">Видео-обзор</label>

                <input id="tab4" type="radio" name="tabs">
                <label for="tab4" title="Вкладка 4">Отзывы</label>

                <section id="content-tab1">
                    <p class="description">Корпус карандаша изготовлен из древесины высокого класса. Грифель карандаша изготавливается по специальной технологии, обеспечивая мягкое и равномерное нанесение рисунка на бумагу. Грифель идеально отцентрован в корпусе, при заточке не крошится и не ломается.</p>
                </section>
                <section id="content-tab2">
                    <table>
                        <tr>
                            <td class="first-col">Торговая марка</td>
                            <td>
                                @if($page->trademark)
                                    {{ $page->trademark->title}}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="first-col">Вид товара</td>
                            <td>Ежедневник</td>
                        </tr>
                        <tr>
                            <td class="first-col">Формат</td>
                            <td>А5</td>
                        </tr>
                        <tr>
                            <td class="first-col">Вид</td>
                            <td>Недатированный</td>
                        </tr>
                        <tr>
                            <td class="first-col">Количество листов</td>
                            <td>320 лист.</td>
                        </tr>
                        <tr>
                            <td class="first-col">Цвет бумаги</td>
                            <td>Белый</td>
                        </tr>
                        <tr>
                            <td class="first-col">Плотность бумаги</td>
                            <td>70.0(г/м2)</td>
                        </tr>
                        <tr>
                            <td class="first-col">Количество в упаковке</td>
                            <td>1(шт.)</td>
                        </tr>
                        <tr>
                            <td class="first-col">Блок</td>
                            <td>Не сменный</td>
                        </tr>
                        <tr>
                            <td class="first-col">Материал обложки</td>
                            <td>Полипропилен</td>
                        </tr>
                        <tr>
                            <td class="first-col">Цвет обложки</td>
                            <td>Разноцветный</td>
                        </tr>
                    </table>
                </section>
                <section id="content-tab3">
                    <p>
                        Здесь размещаете любое содержание....
                    </p>
                </section>
                <section id="content-tab4">
                    <p>
                        Здесь размещаете любое содержание....
                    </p>
                </section>
            </div>

            <div class="related-products">
                <p class="title">Похожие товары</p>
                <div class="slick-slider">
                    @foreach ($page->getRelatedProducts() as $relatedProduct)
                    <div>
                        <div class="item">
                            <a href="{{ $relatedProduct->getUrl() }}"><img src="/img/image_small_300px.jpg" alt="" class="item-img"></a>

                            <div class="item-body">
                                {{--@if( mb_strlen( $product->title ) > 86 )--}}
                                    {{--<h3>{{ mb_substr( $product->title, 0, 86 ) . " ..." }}</h3>--}}
                                {{--@else--}}
                                    <h3>{{ $relatedProduct->title }}</h3>
                                {{--@endif--}}
                                <div class="main-info">
                                    <div class="buy-block">
                                        <div class="buy-block-list">
                                            <div class="price-block">
                                                {{--@if($relatedProduct->old_price)--}}
                                                    {{--<span class="price price-old">{{ $relatedProduct->old_price }}<span> грн.</span></span>--}}
                                                {{--@endif--}}
                                                <span class="price price-new">{{ $relatedProduct->price }}<span> грн.</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-btn">
                                <span class="compare"><i class="fa fa-exchange"></i></span>
                                <span class="like"><i class="fa fa-heart"></i></span>
                                <span class="buy add-to-cart" data-art="{{ $relatedProduct->id }}"><i class="fa fa-shopping-basket"></i></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="right-block">
            <div class="delivery-payment">
                <h3><i class="fa fa-truck"></i>Доставка</h3>
                <p>При условии наличия всего заказанного клиентом товара на складе, доставка осуществляется в течении 1-2 дней. </p>
                <p>При отсутствии некоторых позиций, с Вами свяжется менеджер нашей компании для корректировки заказа либо уточнения срока доставки товара.</p>
                <p>Стоимость доставки заказов до 800 грн. составляет 50 грн.</p>
                <h3><i class="fa fa-money"></i>Оплата</h3>
                <p>Оплата на сайте картой вошего банка через систему онлайн-платежей LiqPay.</p>
                <p>Оплата на сайте картой вошего банка через систему онлайн-платежей LiqPay.</p>
                <p>Оплата на сайте картой вошего банка через систему онлайн-платежей LiqPay.</p>
            </div>
        </div>
    </div>
    <div class="trademarks-slider">
        <div class="multiple-items">
            @foreach ($trademarks as $trademark)
                {{--<div>--}}
                    <a href="{{ route('trademark', $trademark->alias) }}" class="item">
                        <img src="/img/trademarks/{{ $trademark->logo }}" alt="">
                    </a>
                {{--</div>--}}
            @endforeach
        </div>
    </div>
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="panel panel-default">--}}
                    {{--@include('parts.breadcrumbs')--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-12">--}}

                {{--<div class="panel-heading"></div>--}}
                    {{--СТРАНИЦА ТОВАРА!--}}
                {{--<div class="row">--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


@endsection