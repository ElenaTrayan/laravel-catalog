<?php
/**
 * Created by PhpStorm.
 * User: DianaElena
 * Date: 05.10.2017
 * Time: 21:35
 */
?>

@extends('admin::layout')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="page-title-box">
                <h4 class="page-title">Административная панель</h4>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

    {{--<div class="row">--}}

        {{--<div class="col-lg-3 col-md-6">--}}
            {{--<div class="card-box widget-box-two widget-two-custom">--}}
                {{--<i class="fi-paper widget-two-icon"></i>--}}
                {{--<div class="wigdet-two-content">--}}
                    {{--<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Страницы сайта" data-toggle="tooltip">Страницы сайта</p>--}}
                    {{--<h2 class="">--}}
                        {{--<span class="small-text text-muted">Всего:</span>--}}
{{--                        <span data-plugin="counterup">{{ count(\App\Models\Page::all()) }}</span>--}}
                    {{--</h2>--}}
                    {{--<p class="m-0"><a href="{{ route('admin.pages.create') }}" class="btn btn-rounded btn-custom btn-bordered btn-small">Создать страницу</a></p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div><!-- end col -->--}}

        {{--<div class="col-lg-3 col-md-6">--}}
            {{--<div class="card-box widget-box-two widget-two-custom">--}}
                {{--<i class="fa fa-question-circle-o widget-two-icon"></i>--}}
                {{--<div class="wigdet-two-content">--}}
                    {{--<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Вопросы пользователей" data-toggle="tooltip">Вопросы</p>--}}
                    {{--<h2 class="">--}}
                        {{--@if($newLetters = count(\App\Models\Letter::whereNull('read_at')->get()))--}}
                        {{--<span class="small-text text-success m-r-15">Новых: {{ $newLetters }}</span>--}}
                        {{--@endif--}}
                        {{--<span class="small-text text-muted">Всего:</span>--}}
{{--                        <span data-plugin="counterup">{{ count(\App\Models\Letter::all()) }}</span>--}}
                    {{--</h2>--}}
                    {{--<p class="m-0">--}}
                        {{--<a href="{{ route('admin.pages.questions') }}" class="btn btn-rounded btn-custom btn-bordered btn-small m-l-20">--}}
                            {{--<i class="fa fa-caret-right"></i>--}}
                        {{--</a>--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div><!-- end col -->--}}

        {{--<div class="col-lg-3 col-md-6">--}}
            {{--<div class="card-box widget-box-two widget-two-custom">--}}
                {{--<i class="fi-file widget-two-icon"></i>--}}
                {{--<div class="wigdet-two-content">--}}
                    {{--<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Статьи пользователей" data-toggle="tooltip">Статьи пользователей</p>--}}
                    {{--<h2 class="">--}}
                        {{--<span class="small-text text-muted">Всего:</span>--}}
                        {{--<span data-plugin="counterup">{{ count(\App\Models\Letter::all()) }}</span>--}}
                    {{--</h2>--}}
                    {{--<p class="m-0">--}}
                        {{--<a href="{{ route('admin.pages.articles') }}" class="btn btn-rounded btn-custom btn-bordered btn-small m-l-20">--}}
                            {{--<i class="fa fa-caret-right"></i>--}}
                        {{--</a>--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div><!-- end col -->--}}

        {{--<div class="col-lg-3 col-md-6">--}}
            {{--<div class="card-box widget-box-two widget-two-custom">--}}
                {{--<i class="fi-speech-bubble widget-two-icon"></i>--}}
                {{--<div class="wigdet-two-content">--}}
                    {{--<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Комментарии и ответы" data-toggle="tooltip">Комментарии и ответы</p>--}}
                    {{--<h2 class="">--}}
                        {{--<span class="small-text text-muted">Всего:</span>--}}
                        {{--<span data-plugin="counterup">{{ count(\App\Models\Letter::all()) }}</span>--}}
                    {{--</h2>--}}
                    {{--<p class="m-0">--}}
                        {{--<a href="{{ route('admin.comments.index') }}" class="btn btn-rounded btn-custom btn-bordered btn-small m-l-20">--}}
                            {{--<i class="fa fa-caret-right"></i>--}}
                        {{--</a>--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div><!-- end col -->--}}

        {{--<div class="col-lg-3 col-md-6">--}}
            {{--<div class="card-box widget-box-two widget-two-custom">--}}
                {{--<i class="fi-mail widget-two-icon"></i>--}}
                {{--<div class="wigdet-two-content">--}}
                    {{--<p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Письма с контактной формы" data-toggle="tooltip">Письма</p>--}}
                    {{--<h2 class="">--}}
                        {{--@if($newLetters = count(\App\Models\Letter::whereNull('read_at')->get()))--}}
                            {{--<span class="small-text text-success m-r-15">Новых: {{ $newLetters }}</span>--}}
                        {{--@endif--}}
                        {{--<span class="small-text text-muted">Всего:</span>--}}
                        {{--<span data-plugin="counterup">{{ count(\App\Models\Letter::all()) }}</span>--}}
                    {{--</h2>--}}
                    {{--<p class="m-0">--}}
                        {{--<a href="{{ route('admin.letters.index') }}" class="btn btn-rounded btn-custom btn-bordered btn-small m-l-20">--}}
                            {{--<i class="fa fa-caret-right"></i>--}}
                        {{--</a>--}}
                    {{--</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div><!-- end col -->--}}

    {{--</div>--}}
    <!-- end row -->

@endsection