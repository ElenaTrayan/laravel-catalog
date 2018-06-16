@foreach($deliveries as $delivery)
    <option value="{{$delivery->id}}">{{$delivery->id}}</option>
@endforeach

{{--<option value="{{$delivery->delivery_types()->id}}">{{$delivery->delivery_types()->title}}</option>--}}