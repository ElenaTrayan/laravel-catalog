@extends('admin::layout')

@section('content')
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3 class="sec-title">EDIT SLIDER</h3>
            {!! Form::open(['url' => route('admin.products.update', ['id' => $product->id]), 'method' => 'PUT']) !!}
            <div class="form-group">
                {!! Form::label('title') !!}
                {!! Form::text('title', $product->title, array('class'=>'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price') !!}
                {!! Form::text('price', $product->price, array('class'=>'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('barcode') !!}
                {!! Form::textarea('barcode', $product->barcode, array('class'=>'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
