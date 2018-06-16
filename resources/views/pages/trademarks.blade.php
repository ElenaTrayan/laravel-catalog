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

    <ul class="grid" id="grid">
        @foreach ($trademarks as $trademark)
            <li class="grid-item persent-size">
                <a href="{{ route('trademark', $trademark->alias) }}"><img src="/img/trademarks/{{ $trademark->logo }}">
                    <p>{{ $trademark->title }}</p>
                </a>
            </li>
        @endforeach
    </ul>

    {{--<ul class="grid" id="grid">--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_danko_toys.png">--}}
                {{--<p>Danko Toys</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_duracell.png">--}}
               {{--<p>Duracell</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_olli_2.png">--}}
                {{--<p>Olli</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fQdt"><img src="/img/trademarks/logo_economix.png">--}}
                {{--<p>Canada Tape</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fHaa"><img src="/img/trademarks/logo__.png">--}}
                {{--<p>CoolForSchool</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/gXMo"><img src="/img/trademarks/4Office.jpg">--}}
                {{--<p>Полиграф сервис</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/gXMn"><img src="/img/trademarks/class.jpg">--}}
                {{--<p>ТМ "Добрый"</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fzYo"><img src="/img/trademarks/logo_economix.png">--}}
                {{--<p>Незнайка</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fARU"><img src="/img/trademarks/logo_leo.png">--}}
                {{--<p>Профпресс</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fGhI"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Умка</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fKCf"><img src="/img/trademarks/logo_olli_2.png">--}}
                {{--<p>Nota Bene</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fLBG"><img src="/img/trademarks/logo-bic.png">--}}
                {{--<p>Ranok Creative</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fPEY"><img src="/img/trademarks/logo_leo.png">--}}
                {{--<p>Maximus toys</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fWwG"><img src="/img/trademarks/logo_danko_toys.png">--}}
                {{--<p>Умка</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fQdt"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Nota Bene</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fHaa"><img src="/img/trademarks/logo_economix.png">--}}
                {{--<p>Ranok Creative</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/gXMo"><img src="/img/trademarks/logo_olli_2.png">--}}
                {{--<p>Pensan</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/gXMn"><img src="/img/trademarks/logo_danko_toys.png">--}}
                {{--<p>Maximus toys</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fzYo"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Tasсom</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fWMM"><img src="/img/trademarks/logo_danko_toys.png">--}}
                {{--<p>Radius</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fWPV"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Buromax</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fWMT"><img src="/img/trademarks/logo_olli_2.png">--}}
                {{--<p>Castorland</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fQdt"><img src="/img/trademarks/logo_economix.png">--}}
                {{--<p>Centropen</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fHaa"><img src="/img/trademarks/logo_leo.png">--}}
                {{--<p>Danko Toys</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/gXMo"><img src="/img/trademarks/logo_danko_toys.png">--}}
                {{--<p>BIC</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/gXMn"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Flair</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fzYo"><img src="/img/trademarks/logo_economix.png">--}}
                {{--<p>Gemar</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fARU"><img src="/img/trademarks/logo_leo.png">--}}
                {{--<p>Мрії збуваються</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fGhI"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Манго-book</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fKCf"><img src="/img/trademarks/logo_olli_2.png">--}}
                {{--<p>Живий зошит</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fLBG"><img src="/img/trademarks/logo_economix.png">--}}
                {{--<p>ZiBi</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fPEY"><img src="/img/trademarks/logo_leo.png">--}}
                {{--<p>Апельсин</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_danko_toys.png">--}}
                {{--<p>Барвинок</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Бриск</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_economix.png">--}}
                {{--<p>Коленкор</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_olli_2.png">--}}
                {{--<p>Мицар</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_danko_toys.png">--}}
                {{--<p>Spectra Color</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>NORMA</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_danko_toys.png">--}}
                {{--<p>Danko Toys</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Duracell</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_olli_2.png">--}}
                {{--<p>Olli</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fQdt"><img src="/img/trademarks/logo_economix.png">--}}
                {{--<p>Canada Tape</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fHaa"><img src="/img/trademarks/logo__.png">--}}
                {{--<p>CoolForSchool</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/gXMo"><img src="/img/trademarks/4Office.jpg">--}}
                {{--<p>Полиграф сервис</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/gXMn"><img src="/img/trademarks/class.jpg">--}}
                {{--<p>ТМ "Добрый"</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fzYo"><img src="/img/trademarks/logo_economix.png">--}}
                {{--<p>Незнайка</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fARU"><img src="/img/trademarks/logo_leo.png">--}}
                {{--<p>Профпресс</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fGhI"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Умка</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fKCf"><img src="/img/trademarks/logo_olli_2.png">--}}
                {{--<p>Nota Bene</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fLBG"><img src="/img/trademarks/logo-bic.png">--}}
                {{--<p>Ranok Creative</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fPEY"><img src="/img/trademarks/logo_leo.png">--}}
                {{--<p>Maximus toys</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fWwG"><img src="/img/trademarks/logo_danko_toys.png">--}}
                {{--<p>Умка</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fQdt"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Nota Bene</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fHaa"><img src="/img/trademarks/logo_economix.png">--}}
                {{--<p>Ranok Creative</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/gXMo"><img src="/img/trademarks/logo_olli_2.png">--}}
                {{--<p>Pensan</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/gXMn"><img src="/img/trademarks/logo_danko_toys.png">--}}
                {{--<p>Maximus toys</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fzYo"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Tasсom</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fWMM"><img src="/img/trademarks/logo_danko_toys.png">--}}
                {{--<p>Radius</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fWPV"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Buromax</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fWMT"><img src="/img/trademarks/logo_olli_2.png">--}}
                {{--<p>Castorland</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fQdt"><img src="/img/trademarks/logo_economix.png">--}}
                {{--<p>Centropen</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fHaa"><img src="/img/trademarks/logo_leo.png">--}}
                {{--<p>Danko Toys</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/gXMo"><img src="/img/trademarks/logo_danko_toys.png">--}}
                {{--<p>BIC</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/gXMn"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Flair</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fzYo"><img src="/img/trademarks/logo_economix.png">--}}
                {{--<p>Gemar</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fARU"><img src="/img/trademarks/logo_leo.png">--}}
                {{--<p>Мрії збуваються</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fGhI"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Манго-book</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fKCf"><img src="/img/trademarks/logo_olli_2.png">--}}
                {{--<p>Живий зошит</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fLBG"><img src="/img/trademarks/logo_economix.png">--}}
                {{--<p>ZiBi</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="http://drbl.in/fPEY"><img src="/img/trademarks/logo_leo.png">--}}
                {{--<p>Апельсин</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_danko_toys.png">--}}
                {{--<p>Барвинок</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>Бриск</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_economix.png">--}}
                {{--<p>Коленкор</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_olli_2.png">--}}
                {{--<p>Мицар</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_danko_toys.png">--}}
                {{--<p>Spectra Color</p>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="grid-item persent-size">--}}
            {{--<a href="#"><img src="/img/trademarks/logo_duracell.png">--}}
                {{--<p>NORMA</p>--}}
            {{--</a>--}}
        {{--</li>--}}
    {{--</ul>--}}

@endsection