@extends('layouts.app')

@section('content')

    {{--<div class="breadcrumbs-views">--}}
        {{--@include('parts.breadcrumbs')--}}
    {{--</div>--}}

    <div class="panel-heading">{{ $page->getTitle() }}</div>

    <div class="checkout">
        <div class="tabs action-new checkout-form-block">
            <input id="tab1" type="radio" name="tabs" checked>
            <label for="tab1" title="Вкладка 1">Новый покупатель</label>

            <input id="tab2" type="radio" name="tabs">
            <label for="tab2" title="Вкладка 2">Я постоянный клиент</label>

            <section id="content-tab1" class="content-tab">
                {!! Form::open(['route' => ['contact.sendLetter'], 'class' => 'checkout-form', 'id' => 'checkout-form']) !!}
                <div class="personal-data">
                    <p class="title">Личные данные</p>
                    <div class="form-group">
                        <input type="text" placeholder="Фамилия *" required>
                        <label for="">Фамилия *</label>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Имя *" required>
                        <label for="">Имя *</label>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Отчество *" required>
                        <label for="">Отчество *</label>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Телефон *" required>
                        <label for="">Телефон *</label>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="E-mail">
                        <label for="">E-mail</label>
                    </div>
                </div>
                <div class="shipping-information">
                    <p class="title">Информация о доставке</p>
                    <div class="form-group">
                        <label for="ch-region">Область *</label>
                        <select name="ch-region" id="ch-region">
                            <option value="0" selected="selected">Выберите область ...</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ch-city">Город</label>
                        <select name="ch-city" id="ch-city" disabled="disabled">

                        </select>
                    </div>
                    {{--<div class="form-group ch-delivery" id="ch-delivery">--}}
                        {{--<p>Варианты доставки</p>--}}
                        {{--<input type="radio" id="contactChoice1" name="chDelivery" value="email" class="chDelivery">--}}
                        {{--<label for="contactChoice1">Новая почта</label>--}}

                        {{--<input type="radio" id="contactChoice2" name="chDelivery" value="phone" class="chDelivery">--}}
                        {{--<label for="contactChoice2">Интайм</label>--}}

                        {{--<input type="radio" id="contactChoice3" name="chDelivery" value="mail" class="chDelivery">--}}
                        {{--<label for="contactChoice3">УкрПочта</label>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <label for="ch-delivery">Варианты доставки</label>
                        <select name="ch-delivery" id="ch-delivery">
                            {{--<option value="1" selected="selected">Новая почта</option>--}}
                            {{--<option value="2">ИнТайм</option>--}}
                            {{--<option value="3">УкрПочта</option>--}}
                        </select>
                        @foreach($deliveriess as $delivery)
                            <p>{{$delivery->delivery_type_id}}</p>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="ch-payment">Варианты оплаты</label>
                        <select name="ch-payment" id="ch-payment">
                            <option value="" selected="selected">Кредитная карта</option>
                            <option value="">Наличные</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Добавить комментарий к заказу</label>
                        <textarea rows="4">At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.</textarea>
                    </div>
                </div>

                {!! Form::close() !!}
            </section>
            <section id="content-tab2">

            </section>
        </div>

        <div class="checkout-basket">
            <p class="title">
                <span>Ваш заказ</span>
                <span class="" id="">Продолжить покупки</span>
            </p>
            <div class="popup-basket-body">
                <div class="item basket-item">
                    <span class="icon-close"><i class="fa fa-times"></i></span>
                    <div class="item-info">
                        <img src="/img/img.jpg" alt="">
                        <div class="info">
                            <a class="product-name">Sed neque quisquam qui vitae commodi nobis voluptatibus consequatur quidem voluptatem doloribus consequuntur sed perspiciatis. / 757</a>
                            {{--                                @if($item['product_model']->trademark)--}}
                            <p class="trademark"><span>ТМ:</span>CoolForSchool</p>
                            {{--@endif--}}
                            <div class="price-quantity-block">
                                <div class="price-block">
                                    {{--                                    {{--@if($item['product_model']->old_price)--}}
                                    <p class="price price-old"><span>1.56</span><span>грн</span></p>
                                    {{--@endif--}}
                                    <p class="price price-new"><span class="price-here">1.20</span><span>грн</span></p>
                                </div>
                                <span class="quantity">
                            <span class="less"><i class="fa fa-angle-down"></i></span>
                            <input type="text" name="" class="checkbox" value="1" id="" data-id="" maxlength="7">
                            <span class="more"><i class="fa fa-angle-up"></i></span>
                        </span>
                            </div>
                        </div>
                    </div>
                    <p class="basket-total-pop"><span class="total">1.20</span><span>грн</span></p>
                </div>

                <div class="item basket-item">
                    <span class="icon-close"><i class="fa fa-times"></i></span>
                    <div class="item-info">
                        <img src="/img/img.jpg" alt="">
                        <div class="info">
                            <a class="product-name">Omnis minima itaque labore porro et vitae aut et dignissimos molestiae repellendus nulla. / 888</a>
                            {{--                                @if($item['product_model']->trademark)--}}
                            <p class="trademark"><span>ТМ:</span>CoolForSchool</p>
                            {{--@endif--}}
                            <div class="price-quantity-block">
                                <div class="price-block">
                                    {{--                                    {{--@if($item['product_model']->old_price)--}}
                                    <p class="price price-old"><span>2.89</span><span>грн</span></p>
                                    {{--@endif--}}
                                    <p class="price price-new"><span class="price-here">2.50</span><span>грн</span></p>
                                </div>
                                <span class="quantity">
                                            <span class="less"><i class="fa fa-angle-down"></i></span>
                                            <input type="text" name="" class="checkbox" value="2" id="" data-id="" maxlength="7">
                                            <span class="more"><i class="fa fa-angle-up"></i></span>
                                        </span>
                            </div>
                        </div>
                    </div>
                    <p class="basket-total-pop"><span class="total">5.00</span><span>грн</span></p>
                </div>

            </div>

            <div class="popup-basket-footer">
                <div class="total-result">
                    <p>Общая сумма:</p>
                    <p class="total"><span class="amount">6.20</span><span>грн.</span></p>
                </div>
            </div>
        </div>
    </div>

@endsection