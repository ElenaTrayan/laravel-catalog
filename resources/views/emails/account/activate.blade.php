<?php
/**
**/
?>

@component('mail::message')

Для активации аккаунта перейдите по ссылке

@component('mail::button', ['url' => $activationLink])

Активировать аккаунт

@endcomponent

@endcomponent