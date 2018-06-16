@extends('admin::layout')

@section('content')

<div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Basic Data Tables example with responsive plugin</h5>
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

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>Engine version</th>
                        <th>Фактическое количество</th>
                        <th style="min-width:300px;">Название</th>
                        <th>Цена</th>
                        <th>Старая цена</th>
                        <th>Штрихкод</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                    <tr class="gradeX">
                        <td>{{ $product->category }}</td>
                        <td class="center">{{ $product->code }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->old_price }}</td>
                        <td class="center">{{ $product->barcode }}</td>
                        <td class="center">{{ $product->trademark->title }}</td>
                        <td class="center">{{ $product->count }}</td>
                        <td class="center">{{ $product->count }}</td>
                        <td class="center">{{ $product->count }}</td>
                        <td class="center">{{ $product->count }}</td>
                        <td class="center">{{ $product->count }}</td>
                        <td class="center"><a href="{{ route('admin.products.edit', ['id' => $product->id]) }}" class="btn btn-dark">Edit</a></td>
                    </tr>
                    @endforeach
                    <tr class="gradeC">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.0
                        </td>
                        <td>Win 95+</td>
                        <td class="center">5</td>
                        <td class="center">C</td>
                    </tr>
                    <tr class="gradeA">
                        <td>Trident</td>
                        <td>Internet
                            Explorer 5.5
                        </td>
                        <td>Win 95+</td>
                        <td class="center">5.5</td>
                        <td class="center">A</td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                    </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection
