@extends('layouts.app')

@section('content')

    <h2>{{ $page->title }}</h2>

    <form method="GET" action="{{ route('search') }}" class="search-form">
        <input id="search" type="text" class="search-input" name="query" value="{{ \Request::get('query') }}" placeholder="" required>
        <button type="submit" class="search-btn"><i class="fa fa-search top-nav-icon"></i></button>
    </form>

    @if(count($results))
        @foreach($results as $item)
            @if(is_a($item, \App\Models\Page::class))
                {{--Page--}}
                <div>
                    Страница:
                    <a href="{{ $item->getUrl() }}">
                        {{ $item->title }}
                    </a>
                </div>
            @elseif(is_a($item, \App\Models\Product::class))
                {{--Product--}}
                <div>
                    Продукт:
                    <a href="{{ $item->getUrl() }}">
                        {{ $item->title }}
                    </a>
                    <p>{{ $item->trademark->title }}</p>
                    <p>{{ $item->code }}</p>
                </div>
            @elseif(is_a($item, \App\Models\Trademark::class))
                {{--Product--}}
                <div>
                    Торговая марка:
                    <a href="#">
                        {{ $item->title }}
                    </a>
                </div>
            @endif
        @endforeach
    @else
        <p>Уточните критерии поиска</p>
    @endif

@endsection