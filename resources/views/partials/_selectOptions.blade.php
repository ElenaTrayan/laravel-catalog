    {{--<option selected="selected">Выберите город ...</option>--}}
@foreach($cities as $city)
    <option value="{{$city->id}}">{{$city->title}}</option>
@endforeach