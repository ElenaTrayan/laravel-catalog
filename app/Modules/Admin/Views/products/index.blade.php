@extends('admin::layout')

@section('content')

<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Basic Data Tables example with responsive plugin</h5>
            <div class="ibox-tools">
                <a href="{{ route('admin.products.create')}}">
                    Create
                </a>
                {{--<a href="{{ route('admin.products.parser')}}">--}}
                    {{--Parser--}}
                {{--</a>--}}
                <button id="button-delete-selected">
                    Delete selected
                </button>

                {{--<a class="collapse-link">--}}
                    {{--<i class="fa fa-chevron-up"></i>--}}
                {{--</a>--}}
                {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                    {{--<i class="fa fa-wrench"></i>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu dropdown-user">--}}
                    {{--<li><a href="#">Config option 1</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#">Config option 2</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<a class="close-link">--}}
                    {{--<i class="fa fa-times"></i>--}}
                {{--</a>--}}
            </div>
        </div>
        <div class="ibox-content">

            <div class="table-responsive">
                <form action="{{ route('admin.products.deleteSelected')}}" id="delete-selected-form" method="post">
                    {{ csrf_field() }}
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                        <thead>
                        <tr>
                            <th>Чекбоксы</th>
                            <th>Фактическое количество</th>
                            <th style="min-width:300px;">Название</th>
                            <th>Цена</th>
                            <th>Старая цена</th>
                            <th>Штрихкод</th>
                            <th style="min-width:80px;">Торговая марка</th>
                            <th>Фактическое количество</th>
                            <th>Фактическое количество</th>
                            <th>Фактическое количество</th>
                            <th>Фактическое количество</th>
                            <th>Фактическое количество</th>
                            <th>CSS grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                        <tr class="gradeX">
                            <td>
                                <input type="checkbox" name="seleced-items[{{ $product->id }}]" data-id="{{ $product->id }}" class="table-checkbox"/>
                            </td>
                            <td class="center">{{ $product->code }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->old_price }}</td>
                            <td class="center">{{ $product->barcode }}</td>
                            {{--<td class="center">{{ $product->trademark->title }}</td>--}}
                            <td class="center">{{ $product->count }}</td>
                            <td class="center">{{ $product->count }}</td>
                            <td class="center">{{ $product->count }}</td>
                            <td class="center">{{ $product->count }}</td>
                            <td class="center">{{ $product->count }}</td>
                            <td class="center"><a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="btn btn-dark">Edit</a></td>
                        </tr>
                        @endforeach

                        <tfoot>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </form>
                <div id="result"></div>
            </div>
        </div>
    </div>
</div>
@endsection
