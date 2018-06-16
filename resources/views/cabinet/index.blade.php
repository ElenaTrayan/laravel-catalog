<?php
/**
 * Created by PhpStorm.
 * User: DianaElena
 * Date: 05.10.2017
 * Time: 21:35
 */
?>

@extends('layouts.app')

@section('content')

    <div class="breadcrumbs-views">
        <ol class="breadcrumbs">
            <li><a href="{{ url('/') }}">Главная</a></li>
            <li>{{ $page->title }}</li>
        </ol>
    </div>

    <div class="panel-heading">{{ $page->getTitle() }}</div>

@endsection