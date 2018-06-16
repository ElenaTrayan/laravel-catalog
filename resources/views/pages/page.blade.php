@extends('layouts.app')

@section('content')

    <div class="breadcrumbs-views">
        @include('parts.breadcrumbs')
    </div>

    <div class="panel-heading">{{ $page->getTitle() }}</div>

    @if($page->introtext)
        <div class="page-content">
            {!! $page->introtext !!}
        </div>
    @endif

@endsection