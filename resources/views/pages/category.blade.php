@extends('layouts.app')

@section('content')

    <div class="breadcrumbs-views">
        @include('parts.breadcrumbs')
    </div>
    {{--<div class="sub-categories">--}}
        {{--@if(count($childCategories))--}}
            {{--<ul id="sub-categories-items">--}}
                {{--@foreach ($childCategories as $childCategory)--}}
                    {{--<li><a href="{{ url($childCategory->getUrl()) }}">{{ $childCategory->title }} <span>({{count($childCategory->products)}})</span></a></li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
            {{--<span id="show-all">Показать все</span>--}}
        {{--@endif--}}
    {{--</div>--}}
    <div class="products-catalog-head">
        <div class="title">
            <h2>{{ $page->title }} <span>({{count($products)}}) товаров в категории</span></h2>
        </div>
        <div class="products-catalog-sort">
            <form class="form-horizontal" id="sortby-form" method="GET" action="">
                <label>Сортировать: </label>
                <select class="selectpicker ajax-sort sortby" name="sortby">
                    <option value="title" @if(\Request::get('sortby') == 'title') selected @endif>по названию</option>
                    <option value="published_at" @if(\Request::get('sortby') == 'published_at') selected @endif>по дате</option>
                    <option value="price" @if(\Request::get('sortby') == 'price') selected @endif> по цене</option>
                </select>
            </form>
            {{--<a href="javascript:void(0)" class="icon icon-arrow-down tooltip-link m-l-10 @if(\Request::get('direction') == 'desc' || \Request::cookie('direction', 'desc') == 'desc') active @endif sort-direction" data-value="desc" rel="nofollow" title="По убыванию" data-toggle="tooltip"></a>--}}
            {{--<a href="javascript:void(0)" class="icon icon-arrow-up tooltip-link @if(\Request::get('direction') == 'asc' || \Request::cookie('direction', 'desc') == 'asc') active @endif sort-direction" data-value="asc" rel="nofollow" title="По возрастанию" data-toggle="tooltip"></a>--}}
        </div>
        <div class="views">
            <span class="title">Вид:</span>
            <span id="tile" class="active">Плитка</span>
            <span id="list" class="">Список</span>
            {{--<span id="table" class="">Таблица</span>--}}
        </div>
    </div>

    <div class="catalog-block">
        <div class="filters-block">
            <div class="btn-filters-block">
                <span id="js-mobile-filters-category" class="btn btn-filters">Категории</span>
                <span id="js-mobile-filters" class="btn btn-filters">Фильтры</span>
            </div>
            <p class="title">Фильтры:</p>
            @if(count($childCategories))
                <form class="form-horizontal" id="filters-form-category" method="GET" action="">
{{--                    {{ csrf_field() }}--}}
                    {{--action="{{ Request::getUri() }}--}}
                    @if(count($childCategories))
                    <div class="block-filter-category">
                        <div class="filter-category">
                            <div class="filter-category-head">
                                <span id="btn-filter-category" class="heading">Категория</span>
                                <span id="checkall">Все</span>
                            </div>
                            <div class="filter-category-body">

                                    @foreach ($childCategories as $childCategory)
                                        <input type="checkbox" name="subcategories[]" value="{{ $childCategory->id }}" id="{{ $childCategory->id }}" @if(!\Request::get('subcategories') || in_array($childCategory->id, \Request::get('subcategories'))) checked @endif>
                                        {{--class="checkbox__input" id="{{ $childCategory->id }}"--}}
                                        {{--{{ dd($childCategory->id) }}--}}
                                        {{--{{ in_array($childCategory->id, explode(',', \Request::get('categories'))) ? "checked" : ""}}--}}
                                        {{--@if(in_array($childCategory->id, explode(',', \Request::get('categories')))) checked @endif id="categories_{{ $childCategory->id }}"--}}
                                        <label for="{{ $childCategory->id }}" class="checkbox__label">
                                            {{ $childCategory->title }}
                                            <span>({{count($childCategory->products)}})</span>
                                        </label><br>
                                    @endforeach

                            </div>
                            {{--<div class="filter-category-footer">                                --}}{{--<span class="btn apply wave left">Применить</span>--}}
                                {{--<button type="submit" class="btn apply wave left">Применить</button>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                    @endif
                    <div class="block-filter-brand">
                        <div class="filter-brand">
                            <div class="filter-category-head">
                                <span id="btn-filter-brand" class="heading">Бренд</span>
                                <span id="checkallTrademarks">Все</span>
                            </div>
                            <div class="filter-category-body">
                                @foreach ($trademarks_list as $list)
                                    <input type="checkbox" name="trademarks[]" value="{{ $list->id }}" id="{{ $list->id }}" @if(\Request::has('trademarks') && (in_array($list->id, \Request::get('trademarks')))) checked @endif>
                                    <label for="{{ $list->id }}" class="checkbox__label">{{  $list->title }} <span>(12)</span></label><br>
                                @endforeach
                            </div>
                            {{--<div class="filter-category-footer">--}}
                                {{--<span class="btn apply wave left">Применить</span>--}}
                            {{--</div>--}}
                            <div class="filter-category-footer">
                                <button type="submit" class="btn apply wave left">Применить</button>
                            </div>
                        </div>
                    </div>
                    <div class="block-filter-price">
                        <div class="filter-category-head">
                            <span id="btn-filter-price" class="heading">Цена</span>
                        </div>
                        <div class="filter-price">
                            <div class="filter-price-body">
                                <input type="text" name="price_from" value="@if(\Request::has('price_from')) {{ \Request::get('price_from') }} @endif" id="" placeholder="0">
                                <span>-</span>
                                <input type="text" name="price_to" value="@if(\Request::has('price_to')) {{ \Request::get('price_to') }} @endif" id="" placeholder="2000">
                            </div>
                            {{--<div class="filter-category-footer">--}}
                                {{--<span class="btn apply wave left">Применить</span>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </form>
            @endif
{{--            {!! Form::open(['url' => Request::getUri(), 'id' => 'filters-form']) !!}--}}


{{--            {!! Form::close() !!}--}}
        </div>
        <div id="products-catalog" class="tile">
            @foreach ($products as $product)
                {{--<a href="{{$product->getUrl()}}" class="item">--}}
                <div class="item">
                    <div class="products-catalog-body">
                        @if($product->trademark)
                            <img src="/img/trademarks/{{ $product->trademark->logo }}" alt="" class="item-logo">
                        @endif
                        <div class="status">
                            @if($product->new)
                                <span class="st-new">{{ \App\Models\Product::$new[$product->new]}}</span>
                            @endif
                            @if($product->action)
                                <span class="st-stock">{{ \App\Models\Product::$action[$product->action]}}</span>
                            @endif
                        </div>
                        <a href="{{$product->getUrl()}}"><img src="/img/022.png" alt="" class="item-img"></a>
                        <div class="item-body">
                            <div class="info-block">
                                <p class="product-code">Код товара: <span>{{ $product->code }}</span></p>
                                @if($product->trademark)
                                    <p class="trademark">ТМ: <span>{{ $product->trademark->title}}</span></p>
                                @endif
                                @if(\App\Models\Product::$states[$product->state] == 'В наличии')
                                    <span class="available">{{ \App\Models\Product::$states[$product->state]}}</span>
                                @endif
                            </div>
                            <div class="table-code">{{ $product->code }}</div>
                            <a href="{{$product->getUrl()}}"><h3>{{ $product->title }}</h3></a>
                            {{--@if( mb_strlen( $product->title ) > 86 )--}}
                                {{--<h3>{{ mb_substr( $product->title, 0, 86 ) . " ..." }}</h3>--}}
                            {{--@else--}}
                                {{--<h3>{{ $product->title }}</h3>--}}
                            {{--@endif--}}
                            <p class="introtext">{{ $product->introtext }}</p>
                            <span class="img-table"><i class="fa fa-image"></i><img src="/img/img.jpg" class="img-table-block"></span>
                            <div class="main-info">
                                <div class="buy-block">
                                    <div class="buy-block-list">
                                        <div class="price-block">
                                            @if($product->old_price)
                                                <span class="price price-old"> {{ $product->old_price }}<span> грн.</span></span>
                                            @endif
                                            <span class="price price-new price-here">{{ $product->price }}<span> грн.</span></span>
                                        </div>
                                        {{--<span class="quantity">--}}
                                            {{--<span class="less">--}}
                                                {{--<i class="fa fa-angle-down"></i>--}}
                                            {{--</span>--}}
                                            {{--<input type="text" name="" class="checkbox" value="{{ $product->minimal }}" id="" maxlength="7">--}}
                                            {{--<span class="more">--}}
                                                {{--<i class="fa fa-angle-up"></i>--}}
                                            {{--</span>--}}
                                        {{--</span>--}}
                                        <span class="quantity">
                                            <span class="less"><i class="fa fa-angle-down"></i></span>
                                            <input type="text" name="" class="checkbox" value="{{ $product->minimal }}" id="" maxlength="7">
                                            <span class="more"><i class="fa fa-angle-up"></i></span>
                                        </span>
                                        <p class="total">{{ $product->price }}<span> грн.</span></p>
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
                    </div>
                    <div class="add-btn">
                        <span class="compare"><i class="fa fa-exchange"></i></span>
                        <span class="like"><i class="fa fa-heart"></i></span>
                        <span class="buy add-to-cart" data-art="{{ $product->id }}"><i class="fa fa-shopping-basket"></i>Купить</span>
                        {{--<span class="etc-table"><i class="fa fa-ellipsis-v"></i></span>--}}
                        {{--<span class="btns-table"><i class="fa fa-shopping-basket"></i></span>--}}
                    </div>
                    {{--<p>Описание: {{ $product->content }}</p>--}}
                    {{--@if($product->discount_uah)--}}
                        {{--<p>Скидка (грн): {{ $product->discount_uah }}</p>--}}
                    {{--@endif--}}
                    {{--<p><a class="btn btn-primary" href="#" role="button">View details &raquo;</a></p>--}}
                    {{--{{$product->alias}}--}}
                    {{--{{ dd($page->category->getUrl()) }}--}}
                    {{--{{!! route('post.show', $post->slug) !!}}--}}
                </div>
            @endforeach
                {!! $products->appends(\Request::all())->links() !!}
        </div>
    </div>

{{--echo $products->render();--}}

@endsection