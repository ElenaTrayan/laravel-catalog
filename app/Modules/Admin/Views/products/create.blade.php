@extends('admin::layout')

@section('content')

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>All form elements <small>With custom checbox and radion elements.</small></h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#">Config option 1</a>
                </li>
                <li><a href="#">Config option 2</a>
                </li>
            </ul>
            <a class="close-link">
                <i class="fa fa-times"></i>
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <form action="{{route('admin.products.store')}}" method="post" class="form-horizontal">
            {{--<div class="form-group"><label class="col-sm-2 control-label">Normal</label>--}}
                {{--<div class="col-sm-10"><input type="text" class="form-control"></div>--}}
            {{--</div>--}}
            {{--<div class="hr-line-dashed"></div>--}}
            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Название товара</label>
                <div class="col-sm-10">
                    <input id="title" type="text" name="title" class="form-control">
                    <span class="help-block m-b-none">Длина названия должна быть не более 255 символов</span>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label for="page_id" class="col-sm-2 control-label">Категория товара</label>
                <div class="col-sm-10">
                    <input id="page_id" type="text" name="page_id" class="form-control">
                    <span class="help-block m-b-none">Длина названия должна быть не более 255 символов</span>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label for="trademark_id" class="col-sm-2 control-label">Торговая марка товара</label>
                <div class="col-sm-10">
                    <input id="trademark_id" type="text" name="trademark_id" class="form-control">
                    <span class="help-block m-b-none">Длина названия должна быть не более 255 символов</span>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label for="price" class="col-sm-2 control-label">Цена</label>
                <div class="col-sm-10">
                    <input id="price" type="text" name="price" class="form-control">
                    <span class="help-block m-b-none">Длина названия должна быть не более 255 символов</span>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label for="old_price" class="col-sm-2 control-label">Старая цена</label>
                <div class="col-sm-10">
                    <input id="old_price" type="text" name="old_price" class="form-control">
                    <span class="help-block m-b-none">Длина названия должна быть не более 255 символов</span>
                </div>
            </div>
            <div class="hr-line-dashed"></div>

            {{--<div class="hr-line-dashed"></div>--}}
            {{--<div class="form-group"><label class="col-sm-2 control-label">Placeholder</label>--}}

                {{--<div class="col-sm-10"><input type="text" placeholder="placeholder" class="form-control"></div>--}}
            {{--</div>--}}
            {{--<div class="hr-line-dashed"></div>--}}
            {{--<div class="form-group"><label class="col-lg-2 control-label">Disabled</label>--}}
                {{--<div class="col-lg-10"><input type="text" disabled="" placeholder="Disabled input here..." class="form-control"></div>--}}
            {{--</div>--}}
            {{--<div class="hr-line-dashed"></div>--}}

            {{--<div class="hr-line-dashed"></div>--}}
            {{--<div class="form-group"><label class="col-sm-2 control-label">Checkboxes and radios <br/>--}}
                    {{--<small class="text-navy">Normal Bootstrap elements</small></label>--}}

                {{--<div class="col-sm-10">--}}
                    {{--<div><label> <input type="checkbox" value=""> Option one is this and that&mdash;be sure to include why it's great </label></div>--}}
                    {{--<div><label> <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios"> Option one is this and that&mdash;be sure to--}}
                            {{--include why it's great </label></div>--}}
                    {{--<div><label> <input type="radio" value="option2" id="optionsRadios2" name="optionsRadios"> Option two can be something else and selecting it will--}}
                            {{--deselect option one </label></div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="hr-line-dashed"></div>--}}

            {{--<div class="hr-line-dashed"></div>--}}
            {{--<div class="form-group"><label class="col-sm-2 control-label">Checkboxes &amp; radios <br/><small class="text-navy">Custom elements</small></label>--}}

                {{--<div class="col-sm-10">--}}
                    {{--<div class="i-checks"><label> <input type="checkbox" value=""> <i></i> Option one </label></div>--}}
                    {{--<div class="i-checks"><label> <input type="checkbox" value="" checked=""> <i></i> Option two checked </label></div>--}}
                    {{--<div class="i-checks"><label> <input type="checkbox" value="" disabled="" checked=""> <i></i> Option three checked and disabled </label></div>--}}
                    {{--<div class="i-checks"><label> <input type="checkbox" value="" disabled=""> <i></i> Option four disabled </label></div>--}}
                    {{--<div class="i-checks"><label> <input type="radio" value="option1" name="a"> <i></i> Option one </label></div>--}}
                    {{--<div class="i-checks"><label> <input type="radio" checked="" value="option2" name="a"> <i></i> Option two checked </label></div>--}}
                    {{--<div class="i-checks"><label> <input type="radio" disabled="" checked="" value="option2"> <i></i> Option three checked and disabled </label></div>--}}
                    {{--<div class="i-checks"><label> <input type="radio" disabled="" name="a"> <i></i> Option four disabled </label></div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="hr-line-dashed"></div>--}}

            {{--<div class="hr-line-dashed"></div>--}}
            {{--<div class="form-group"><label class="col-sm-2 control-label">Select</label>--}}

                {{--<div class="col-sm-10"><select class="form-control m-b" name="account">--}}
                        {{--<option>option 1</option>--}}
                        {{--<option>option 2</option>--}}
                        {{--<option>option 3</option>--}}
                        {{--<option>option 4</option>--}}
                    {{--</select>--}}

                    {{--<div class="col-lg-4 m-l-n"><select class="form-control" multiple="">--}}
                            {{--<option>option 1</option>--}}
                            {{--<option>option 2</option>--}}
                            {{--<option>option 3</option>--}}
                            {{--<option>option 4</option>--}}
                        {{--</select></div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="hr-line-dashed"></div>--}}
            {{--<div class="form-group has-success"><label class="col-sm-2 control-label">Input with success</label>--}}

                {{--<div class="col-sm-10"><input type="text" class="form-control"></div>--}}
            {{--</div>--}}
            {{--<div class="hr-line-dashed"></div>--}}
            {{--<div class="form-group has-warning"><label class="col-sm-2 control-label">Input with warning</label>--}}

                {{--<div class="col-sm-10"><input type="text" class="form-control"></div>--}}
            {{--</div>--}}
            {{--<div class="hr-line-dashed"></div>--}}
            {{--<div class="form-group has-error"><label class="col-sm-2 control-label">Input with error</label>--}}

                {{--<div class="col-sm-10"><input type="text" class="form-control"></div>--}}
            {{--</div>--}}
            {{--<div class="hr-line-dashed"></div>--}}

            {{--<div class="form-group"><label class="col-sm-2 control-label">Input groups</label>--}}

                {{--<div class="col-sm-10">--}}
                    {{--<div class="input-group m-b"><span class="input-group-addon">@</span> <input type="text" placeholder="Username" class="form-control"></div>--}}
                    {{--<div class="input-group m-b"><input type="text" class="form-control"> <span class="input-group-addon">.00</span></div>--}}
                    {{--<div class="input-group m-b"><span class="input-group-addon">$</span> <input type="text" class="form-control"> <span class="input-group-addon">.00</span></div>--}}
                    {{--<div class="input-group m-b"><span class="input-group-addon"> <input type="checkbox"> </span> <input type="text" class="form-control"></div>--}}
                    {{--<div class="input-group"><span class="input-group-addon"> <input type="radio"> </span> <input type="text" class="form-control"></div>--}}
                {{--</div>--}}
            {{--</div>--}}

            {{--<div class="hr-line-dashed"></div>--}}

            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-white" type="submit">Отмена</button>
                    <button class="btn btn-primary" type="submit">Создать товар</button>
                </div>
            </div>

            {{ csrf_field() }}

        </form>
    </div>
</div>

@endsection