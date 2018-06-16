@extends('layouts.app')

@section('content')

    @if($page->title)
        <div class="panel-heading">{{ $page->title }}</div>
    @endif

    <div id="sitemap">
        <ul class="tree">
            @foreach($sitemapItems as $item)
                <li>
                    <a href="{{ $item->getUrl() }}">
                        <span>{{ $item->getTitle() }}</span>
                    </a>
                    {{ \App\Helpers\View::getChildrenPages($item, $item->getUrl()) }}
                </li>
            @endforeach
        </ul>
    </div>

@endsection