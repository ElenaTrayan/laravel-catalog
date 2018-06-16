@if(count($cart))
    <p class="title">
        <span>Корзина</span>
        <span class="close" id="close-mobile-basket">Закрыть</span>
    </p>
    <div class="popup-basket-body">
        @foreach($cart as $item)
            @if($item['product_model'] && is_object($item['product_model']))
                <div class="item basket-item">
                    <span class="icon-close" data-id-delete="{{ $item['product_model']->id }}"><i class="fa fa-times"></i></span>
                    <div class="item-info">
                        <img src="/img/img.jpg" alt=""> <!--class="img-product-basket"-->
                        <div class="info">
                            <a class="product-name">{{ $item['product_model']->title }} / {{ $item['product_id'] }}</a>
                            @if($item['product_model']->trademark)
                                <p class="trademark"><span>ТМ:</span> {{ $item['product_model']->trademark->title }}</p>
                            @endif
                            <div class="price-quantity-block">
                                <div class="price-block">
                                    @if($item['product_model']->old_price)
                                        <p class="price price-old"><span>{{ $item['product_model']->old_price }}</span><span>грн</span></p>
                                    @endif
                                        <p class="price price-new"><span class="price-here">{{ $item['product_model']->price }}</span><span>грн</span></p>
                                </div>
                                <span class="quantity">
                                <span class="less"><i class="fa fa-angle-down"></i></span>
                                <input type="text" name="" class="checkbox" value="{{ $item['count'] }}" id="" data-id="{{ $item['product_model']->id }}" maxlength="7">
                                <span class="more"><i class="fa fa-angle-up"></i></span>
                            </span>
                            </div>
                        </div>
                    </div>
                    <p class="basket-total-pop"><span class="total">{{ $item['product_model']->price * $item['count'] }}</span><span>грн</span></p>
                </div>
            @endif
        @endforeach
    </div>

    <div class="popup-basket-footer">
        <div class="total-result">
            <p>Общая сумма:</p>
            <p class="total"><span class="amount">{{ $amount }}</span><span>грн.</span></p>
        </div>
        <div class="btn-actions">
            <a href="{{ route('basket') }}" class="btn btn-edit-basket">Перейти в корзину</a>
            <a href="#" class="btn btn-make-order">Оформить заказ</a>
        </div>
    </div>
@else
    Ваша корзина пуста
@endif