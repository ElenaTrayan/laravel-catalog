@extends('layouts.app')

@section('content')

    <div class="breadcrumbs-views">
        @include('parts.breadcrumbs')
    </div>

    <div class="panel-heading">{{ $page->getTitle() }}</div>

    {{--@if($page->introtext)--}}
        {{--<div class="page-content">--}}
            {{--{!! $page->introtext !!}--}}
        {{--</div>--}}
    {{--@endif--}}

    <!-- CONTACTS -->
    <div class="contact-block">

        <div class="block-contact-info">
            <h4 class="title">Мы всегда на связи</h4>
            <p>Связаться с нами вы всегда можете по телефонам указанным в шапке сайта.</p>
            <p class="indent">Также вы можете направить свой запрос/жалобу/предложение с помощью следующей формы.</p>

            <p>Мы находимся в городе Харьков. ул. Салтовское шоссе, 100</p>
            <p class="">Время работы:</p>
            <p>Пн-Пт: 9:00 - 18:00</p>
            <p class="indent">Сб: 9:00 - 16:00</p>

            <p>Звонки с мобильных телефонов оплачиваются в соответствии с действующими тарифами операторов.</p>
            <ul class="contact indent">
                <li><i class="fa fa-phone"></i> +38 (063) 422-49-95</li>
                <li><i class="fa fa-phone"></i> +38 (063) 422-49-95</li>
                <li><i class="fa fa-phone"></i> +38 (063) 422-49-95</li>
            </ul>

            <p>Жалобы и предложения касательно работы интернет-магазина присылайте на e-mail: admin@bootexperts.com</p>

        </div>

        <section class="section-contact" id="anchor08">
            {{--<p class="pretitle">Если возникли вопросы или есть пожелания</p>--}}
            <h2 class="title">Напишите нам письмо</h2>

                {!! Form::open(['route' => ['contact.sendLetter'], 'class' => 'ajax-form contact-form', 'id' => 'contact-form']) !!}

                    <div class="response-message success" role="alert" @if(!Session::has('successMessage')) style="display: none" @endif>
                        @if(Session::has('successMessage'))
                            {{ Session::get('successMessage') }}
                        @endif
                    </div>

                    <div class="response-message error" role="alert" @if(!Session::has('errorMessage')) style="display: none" @endif>
                        @if(Session::has('errorMessage'))
                            {{ Session::get('errorMessage') }}
                        @endif
                    </div>
                    <div class="form-group @if($errors->has('type')) has-error @endif">
                        <label class="title small" for="message">Тема:</label>
                        {!! Form::select('type', \App\Letter::$subjects, null, ['id' => 'type', 'class' => 'select-dropdown']) !!}
                        {{--Errors--}}
                        <span class="help-block error type_error" @if(!$errors->has('type')) style="display: none;" @endif>
                            <span class="text">{{ $errors->first('type') }}</span>
                        </span>
                    </div>
                    <div class="form-group @if($errors->has('message')) has-error @endif">
                        <label class="title small" for="message">Сообщение:</label>
                        {!! Form::textarea('message', null, ['id' => 'message', 'class' => 'text area', 'placeholder' => 'Ваш вопрос или пожелание *', 'rows' => 3]) !!}
                        {{--Errors--}}
                        <span class="help-block error message_error" @if(!$errors->has('message')) style="display: none;" @endif>
                            <span class="text">{{ $errors->first('message') }}</span>
                        </span>
                    </div>

                    <div class="form-group @if($errors->has('name')) has-error @endif">
                        <span class="bar"></span>
                        <label class="title small" for="name">Имя:</label>
                        {!! Form::text('name', null, ['id' => 'name', 'class' => 'text name', 'placeholder' => 'Ваше имя *']) !!}
                        {{--Errors--}}
                        <span class="help-block error name_error" @if(!$errors->has('name')) style="display: none;" @endif>
                            <span class="text">{{ $errors->first('name') }}</span>
                        </span>
                    </div>

                    <div class="form-group @if($errors->has('email')) has-error @endif">
                        <span class="bar"></span>
                        <label class="title small" for="name">Email:</label>
                        {!! Form::text('email', null, ['id' => 'email', 'class' => 'text email', 'placeholder' => 'Ваш Email *']) !!}
                        {{--Errors--}}
                        <span class="help-block error email_error" @if(!$errors->has('email')) style="display: none;" @endif>
                            <span class="text">{{ $errors->first('email') }}</span>
                        </span>
                    </div>

                    <div class="form-group @if($errors->has('phone_cell')) has-error @endif">
                        <span class="bar"></span>
                        <label class="title small" for="name">Номер телефона:</label>
                        {!! Form::text('phone_cell', null, ['id' => 'phone_cell', 'name' => 'phone_cell']) !!}
                        {{--Errors--}}
                        <span class="help-block error phone_error" @if(!$errors->has('phone_cell')) style="display: none;" @endif>
                            <span class="text">{{ $errors->first('phone_cell') }}</span>
                        </span>
                    </div>

                    {!! Form::hidden('send_copy', 0) !!}
                        {{--<div class="form-group">--}}
                        {{--{!! Form::hidden('send_copy', 0) !!}--}}
                        {{--{!! Form::checkbox('send_copy', 1, 1, ['id' => 'send_copy', 'class' => 'float-left']) !!}--}}
                        {{--{!! Form::label('send_copy', 'Отправить копию этого сообщения на Ваш адрес e-mail', ['class' => 'control-label float-left']) !!}--}}
                        {{--</div>--}}
                    <!--<div class="formSent"><p><strong>Ваше сообщение было отправлено!</strong> Спасибо, что связались с нами.</p></div>-->
                    <input type="submit" value="Отправить" class="btn send">
                    <div class="voffset80"></div>

                {!! Form::close() !!}
        </section>

    </div>

    <!-- PAGE CONTENT -->
    {{--@if($page->content)--}}
        {{--<section class="section featured-shop">--}}
            {{--<div class="container">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-lg-12 col-md-12 col-xs-12">--}}
                        {{--<div class="page-content">--}}
                            {{--@if($page->getImageUrl())--}}
                                {{--<img src="{{ $page->getImageUrl('full') }}" alt="{{ $page->image_alt }}" title="{{ $page->image_alt }}" class=page-image>--}}
                            {{--@endif--}}
                            {{--{!! $page->content !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
    {{--@endif--}}
@endsection()

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".phone_cell").inputmask({"mask": "(999) 999-9999"});

            $('.ajax-form').on('submit', function (e) {
                e.preventDefault ? e.preventDefault() : e.returnValue = false;
                var $form = $(this),
                    formData = new FormData(),
                    params   = $form.serializeArray(),
                    url = $form.attr('action');
                if($form.find('[type="file"]').length) {
                    var image = $form.find('[type="file"]')[0].files[0]
                }
                $.each(params, function(i, val) {
                    formData.append(val.name, val.value);
                });
                if(image) {
                    formData.append('image', image);
                }
                $.ajax({
                    data: formData,
                    type: 'POST',
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    url: url,
                    beforeSend: function(request) {
                        $form.find('.error').hide().find('.text').text('');
                        $form.find('.has-error').removeClass('has-error');
                        $form.find('.response-message').hide().text('');
                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
                    },
                    success: function(response) {
                        if(response.success) {
//                        notification(response.message, 'success');
                            $form.trigger('reset');
                            $form.find('.response-message.success').show().text(response.message);
                            $('html, body').animate({
                                scrollTop: $(this).offset().top - 50
                            }, 1000);
                        } else {
//                        notification(response.message, 'error');
                            $form.find('.response-message.error').show().text(response.message);
                            $.each(response.errors, function(index, value) {
                                var errorDiv = '.' + index + '_error';
                                $form.find(errorDiv).parent().addClass('has-error');
                                $form.find(errorDiv).show().find('.text').text(value);
                            });
                        }
                    }
                });
            });
        });
    </script>
@endpush