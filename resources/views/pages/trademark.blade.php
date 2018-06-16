@extends('layouts.app')

@section('content')

    <div class="breadcrumbs-views">
        <ol class="breadcrumbs">
            <li><a href="/trade-marks">{{ $page->title }}</a></li>
            <li>{{ $trademark->title }}</li>
        </ol>
        @if (count($products))
            <div class="views">
                <span class="title">Вид:</span>
                <span id="tile" class="active">Плитка</span>
                <span id="list" class="">Список</span>
                <span id="table" class="">Таблица</span>
            </div>
        @endif
    </div>

    <div class="panel-heading">{{ $trademark->title }}</div>

    {{--@if($page->introtext)--}}
        {{--<div class="page-content">--}}
            {{--{!! $page->introtext !!}--}}
        {{--</div>--}}
    {{--@endif--}}
    <div class="trademark-page">
        <img src="/img/trademarks/{{ $trademark->logo }}">
        <div class="content">
            <p>{{$trademark->content}}</p>
            <p>В ассортименте данной торговой марки есть следующие группы товаров: Бумажная продукция
                Письменные принадлежности
                Товары для творчества
                Рамки, сумки и пеналы
            </p>
            <p>Торговая марка Optima (Оптима) сочетает в себе немецкое качество и приемлемую цену, оригинальный дизайн и разнообразие дизайнов оформления товаров. Товары данной торговой марки являются отличным выбором для тех, кто ценит свое время и комфорт в делопроизводстве.</p>
        </div>
    </div>

    @if (count($products))
        <div id="products-catalog" class="tile">
            @foreach ($products as $product)
                <a href="{{$product->getUrl()}}" class="item">

                    <img src="/img/Тетрада.jpg" alt="" class="item-logo">
                    <div class="status">
                        @if($product->new)
                            <span class="st-new">{{ \App\Models\Product::$new[$product->new]}}</span>
                        @endif
                        @if($product->action)
                            <span class="st-stock">{{ \App\Models\Product::$action[$product->action]}}</span>
                        @endif
                    </div>
                    <img src="/img/img.jpg" alt="" class="item-img">
                    <div class="item-body">
                        <div class="info-block">
                            <p class="product-code">Код товара: <span>{{ $product->code }}</span></p>
                            {{--@if($product->trademark)--}}
                            {{--<p class="trademark">ТМ: <span>{{ $product->trademark->title}}</span></p>--}}
                            {{--@endif--}}
                            <span class="available">{{ \App\Models\Product::$states[$product->state]}}</span>
                        </div>
                        <div class="table-code">{{ $product->code }}</div>
                        @if( mb_strlen( $product->title ) > 86 )
                            <h3>{{ mb_substr( $product->title, 0, 86 ) . " ..." }}</h3>
                        @else
                            <h3>{{ $product->title }}</h3>
                        @endif
                        <span class="img-table"><i class="fa fa-image"></i><img src="/img/img.jpg" class="img-table-block"></span>
                        <div class="main-info">
                            <div class="buy-block">
                                <div class="buy-block-list">
                                    <div class="price-block">
                                        @if($product->old_price)
                                            <span class="price price-old"> {{ $product->old_price }}<span> грн.</span></span>
                                        @endif
                                        <span class="price price-new">{{ $product->price }}<span> грн.</span></span>
                                    </div>
                                    <span class="quantity">
                                        <span class="less"><i class="fa fa-angle-down"></i></span>
                                        <input type="text" name="" class="checkbox" value="1200" id="" maxlength="7">
                                        <span class="more"><i class="fa fa-angle-up"></i></span>
                                    </span>
                                    <p class="total">15793,65 <span> грн.</span></p>
                                </div>
                            </div>
                            {{--<div class="count-block">--}}
                            {{--<p class="minimum">Минимальное количество для заказа - 36 шт.</p>--}}
                            {{--<p>Количество в упаковке: 24 шт.</p>--}}
                            {{--<p>Количество в ящике: 288 шт.</p>--}}
                            {{--<p class="description">Корпус карандаша изготовлен из древесины высокого класса. Грифель карандаша изготавливается по специальной технологии, обеспечивая мягкое и равномерное нанесение рисунка на бумагу. Грифель идеально отцентрован в корпусе, при заточке не крошится и не ломается.</p>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    <div class="add-btn">
                        <span class="compare"><i class="fa fa-exchange"></i></span>
                        <span class="like"><i class="fa fa-heart"></i></span>
                        <span class="buy"><i class="fa fa-shopping-basket"></i>Купить</span>
                    </div>
                    <span class="etc-table"><i class="fa fa-ellipsis-v"></i></span>
                    <span class="btns-table"><i class="fa fa-shopping-basket"></i></span>
                    {{--<p>Описание: {{ $product->content }}</p>--}}
                    {{--@if($product->discount_uah)--}}
                    {{--<p>Скидка (грн): {{ $product->discount_uah }}</p>--}}
                    {{--@endif--}}
                    {{--<p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>--}}
                    {{--{{$product->alias}}--}}
                    {{--{{ dd($page->category->getUrl()) }}--}}
                    {{--{{!! route('post.show', $post->slug) !!}}--}}
                </a>
            @endforeach
        </div>
    @endif

@endsection