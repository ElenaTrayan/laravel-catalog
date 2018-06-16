@extends('layouts.app')

@section('content')

    <div class="breadcrumbs-views">
        @include('parts.breadcrumbs')
    </div>

    <div class="panel-heading">{{ $page->getTitle() }}</div>

    <div id="page-cart-content">
        <p class="content">Ваша корзина пуста</p>
    </div>

@endsection

@push('scripts')
    <script type="text/javascript">
        var isCartPage = true;
    </script>
@endpush