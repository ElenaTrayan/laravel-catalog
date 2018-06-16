@if(count($cart))
    <div class="basket basket-page">
        <div class="item-title">
            <p class="td1">Наименование товара и описание</p>
            <p class="td2">Цена</p>
            <p class="td3">Количество</p>
            <p class="td4">Итого</p>
        </div>
        @foreach($cart as $item)
            @if($item['product_model'] && is_object($item['product_model']))
                <div class="basket-item">
                    <div class="basket-title-desc">
                        <span class="icon-close" data-id-delete="{{ $item['product_model']->id }}"><i class="fa fa-times"></i></span>
                        <a href="#" class="basket-img"><img src="/img/022.png" alt=""></a>
                        <div class="information">
                            <a href="#" class="title">{{ $item['product_model']->title }} / {{ $item['product_id'] }}</a>
                            <span>Код товара: {{ $item['product_model']->code }}</span>
    {{--                        <span>ТМ: {{ $item['product_model']->trademark->title }}</span>--}}
                        </div>
                    </div>
                    <div class="price-quantity-block">
                        <p class="td2"><span class="price price-new price-here">{{ $item['product_model']->price }}</span><span> грн.</span></p>
                        <span class="quantity td3">
                            <span class="less"><i class="fa fa-angle-down"></i></span>
                            <input type="text" name="" class="checkbox" value="{{ $item['count'] }}" data-id="{{ $item['product_model']->id }}" id="" maxlength="7">
                            <span class="more"><i class="fa fa-angle-up"></i></span>
                        </span>
                        <p class="td4 basket-total"><span class="total">{{ $item['product_model']->price * $item['count'] }}</span><span> грн.</span></p>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="basket-total-result">
            <span class="clear-cart">Очистить корзину</span>
            <p>Общая сумма: <span class="amount">{{ $amount }}</span><span>грн.</span></p>
        </div>
    </div>
    <p class="basket-checkout"><a href="{{ url('/checkout') }}" class="btn checkout">Оформить заказ</a></p>
@endif