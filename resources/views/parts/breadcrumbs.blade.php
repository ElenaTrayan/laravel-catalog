<?php
/**
 * Created by PhpStorm.
 * User: DianaElena
 * Date: 19.09.2017
 * Time: 1:04
 */

 ?>
<ol class="breadcrumbs">
    @if($page->parent)
        @if($page->parent->parent)
            <li><a href="{{ $page->parent->parent->getUrl() }}">{{ $page->parent->parent->title }}</a></li>
        @endif
        <li><a href="{{ $page->parent->getUrl() }}">{{ $page->parent->title }}</a></li>
    @endif
    <li>{{ $page->title }}</li>
</ol>
