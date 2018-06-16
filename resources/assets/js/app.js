
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('../../../node_modules/jquery/dist/jquery');
require('./bootstrap');
//require('../../');
require('./slick.min');


//require('./ripple');
//window.Vue = require('vue');

// var Inputmask = require('inputmask');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Example.vue'));
//
//const app = new Vue({
//    el: '#app'
//});

// $('.menu-catalog-active ul li').hover(function () {
//         var mega_inner  = $(this).find('.mega-menu ul');
//         mega_inner.css({'display':'block'});
//     },
//     function () {
//         var mega_inner  = $(this).find('.mega-menu ul');
//         mega_inner.css({'display':'none'});
//     }
//     }
// );

var d = document;
// Глобально создаём массив (до document ready function):
var cart = {}; // моя корзина


$('document').ready(function(){

    checkCart(); // проверяем пустая ли корзина
    showMiniCart(); // выводим корзину в html

    $('input[name*="seleced-items"]').on('click', function(e) {
        var checked = false;
        $('input[name*="seleced-items"]').each(function() {
            if ($(this).is(":checked")) {
                checked = true;
            }
        });

        if(checked) {
            $('#button-delete-selected').removeAttr('disabled');
        } else {
            $('#button-delete-selected').attr('disabled', true);
        }
    });

    $('#button-delete-selected').on('click', function(e) {
        /* delete in your code -> */
        var items = $('input[name*="seleced-items"]:checkbox:checked').map(function(){
            return $(this).data('id');
        }).get();
        //$('#result').text('Delete items ' + items);
        /* <- delete in your code */

        $('#delete-selected-form').submit();
    });

    /* Липкое меню (прилипает к верху страницы при прокрутке)*/
    var headerTop = $('#menu-fixed').offset().top;

    $(window).scroll(function(){
        if( $(window).scrollTop() > headerTop ) {
            // $('#menu-fixed').css({position: 'absolute', top: '0vh', width: '100%'});
            $('#menu-fixed').css({position: 'fixed', top: '0px', width: '100%'});
        } else {
            $('#menu-fixed').css({position: 'static'});
        }
    });
    /* END Липкое меню */

    /* Открываем и закрываем меню по нажатию на Каталог товаров*/
    $('#humb-catalog').click(function(){
        $('#humb-catalog').toggleClass('active');
        if(!$('#humb-catalog').hasClass('active')) {
            $('.menu-catalog-close').removeClass('menu-catalog-active');
            $("#menu-fixed").removeClass('active');
            $("#menu-fixed .case-upper-block").css({background: '#fff'});
            // $('#humb-catalog').removeClass('active');
        } else {
            $('.menu-catalog-close').addClass('menu-catalog-active');
            var heightMegaM = $('.menu-catalog-active').outerHeight();
            $(".mega-menu").css({'height': heightMegaM});
            $("#menu-fixed").addClass('active');
            $("#menu-fixed .case-upper-block").css({background: 'rgba(0,0,0,.9)'});
            // $(".menu-catalog-active::before").css({'height': heightMegaM});
            // $('#humb-catalog').addClass('active');
        }
    });
    /* END Открываем меню по нажатию на Каталог товаров */
    /* Открываем и закрываем меню Алфавит*/
    $('#js-alphabet').click(function(){
        $('#js-alphabet').toggleClass('active');
        if(!$('#js-alphabet').hasClass('active')) {
            $('.lower-block').removeClass('active');
        } else {
            $('.lower-block').addClass('active');
        }
    });
    /* END Открываем и закрываем меню Алфавит js-alphabet */

    /* Скрываем меню Каталог товаров, если клик был вне области нашего меню */
    // $(document).mouseup(function (e){ // событие клика по веб-документу
    //     var ul = $(".menu-catalog-close"); // тут указываем ID элемента
    //     var catalog = $("#humb-catalog");
    //     if (catalog.is(e.target) || !ul.is(e.target) && ul.has(e.target).length === 0) { // и не по его дочерним элементам
    //         //ul.hide(); // скрываем его
    //         $('.menu-catalog-close').removeClass('menu-catalog-active');
    //     }
    // });
    /* END Скрываем меню Каталог товаров, если клик был вне области нашего меню */

    /* Открываем ПОИСК по нажатию на input */
    $('.search-input').click(function(){
        $('.search-input').addClass('active');
        //     //.attr(placeholder, 'Введите поисковый запрос ...')
        //     $('.search-form').css({'width': 'calc(100%)'});
    });
    /* Скрываем поиск, если клик был вне области нашего поиска */
    $(document).mouseup(function (e){
        var searchForm = $(".search-form");
        if (!searchForm.is(e.target) && searchForm.has(e.target).length === 0) {
            // //         $('.search-form').css({'width': 'auto'});
            $('.search-input').removeClass('active');
        }
    });

    /* Открываем ПОИСК по нажатию на иконку */
    //$('#search').click(function(){
    //    $('.search-input').addClass('active');
    //    $('.search-form').css({'width': 'calc(100% + 118px)', 'padding-left': '15px'});
    //    $('.search-btn').css({'width': '53px', 'height': '53px', 'overflow': 'none', 'z-index': '9'});
    //});
    /* Скрываем поиск, если клик был вне области нашего поиска */
    //$(document).mouseup(function (e){ // событие клика по веб-документу
    //    var ul = $(".search-btn"); // тут указываем ID элемента
    //    if (!ul.is(e.target) // если клик был не по нашему блоку
    //        && ul.has(e.target).length === 0) { // и не по его дочерним элементам
    //        //ul.hide(); // скрываем его
    //        $('.search-input').removeClass('active');
    //        $('.search-form').css({'width': 'auto', 'padding-left': '0'});
    //        $('.search-btn').css({'width': '0', 'height': '0', 'overflow': 'hidden', 'z-index': '-1'});
    //    }
    //});


    /* Выезжание меню по нажатию на "гамбургер" (на мобильном экране) */
    $('.humb').click(function(){
        $('.main-nav').addClass('active');
        $('#mobile-bg').addClass('active');
    });
    /* Скрываем меню, если клик был вне области нашего меню (на мобильном экране) */
    $(document).mouseup(function (e){ // событие клика по веб-документу
        var ul = $(".menu-mb-close"); // тут указываем ID элемента
        if (!ul.is(e.target) // если клик был не по нашему блоку
            && ul.has(e.target).length === 0) { // и не по его дочерним элементам
            //ul.hide(); // скрываем его
            $('.main-nav').removeClass('active');
            $('#mobile-bg').removeClass('active');
        }
    });

    //если у li элемента есть дочерние ul, к li добавляем класс "hide-submenu"
    $(".menu-mb-close li:has(ul)").addClass('hide-submenu');
    //проверяем клик по элементу hide-submenu, при клике - добавляем класс active
    $('.hide-submenu').click(function(){
        $('.hide-submenu').toggleClass('active');
    });

    /* Открываем и закрываем фильтры (Мобильный экран)*/
    $('#js-mobile-filters-category').click(function(){
        // $('#filters-form-category').toggleClass('active');
        if(!$('#filters-form-category').hasClass('active')) {
            $('#filters-form-category').addClass('active');
            $('#filters-form').removeClass('active');
        } else {
            $('#filters-form-category').removeClass('active');
        }
    });
    $('#js-mobile-filters').click(function(){
        if(!$('#filters-form').hasClass('active')) {
            $('#filters-form').addClass('active');
            $('#filters-form-category').removeClass('active');
        } else {
            $('#filters-form').removeClass('active');
        }
    });
    /* END Открываем и закрываем фильтры (Мобильный экран)*/
    //Фильтры в два столбика на экране больше 768 и меньше 992
    // var ScreenWidth = screen.width;
    // var ScreenHeight = screen.height;
    // // alert(ScreenWidth+'x'+ScreenHeight);
    //
    // var countLabel = $('#filters-form-category').find('label').length;
    // var heightLabels = countLabel / 2;
    // console.log(heightLabels);
    // if(ScreenWidth >= 768 && ScreenWidth < 992){
    //     if(Number.isInteger(heightLabels) == true){
    //         heightLabels = (heightLabels * 34) + 30; // + 27px
    //         $('#filters-form-category .filter-category-body').css({'height': heightLabels});
    //     }else{
    //         heightLabels = (Math.ceil(heightLabels) * 34) + 30;
    //         $('#filters-form-category .filter-category-body').css({'height': heightLabels});
    //     }
    // }
    // else{
    //     $('#filters-form-category .filter-category-body').css({'height': 'auto'});
    // }



    /* Поп-ап окно - Корзина покупок */
    $('#mobile-basket').click(function(){
        $('.popup-basket').addClass('active');
    });

    // $('#close-mobile-basket').click(function(){
    //     $('.popup-basket').removeClass('active');
    // }); //этот код не подходит, если элементы загружаются после загрузки страницы
    $(document).on('click', '#close-mobile-basket', function () {
        $('.popup-basket').removeClass('active');
    });

    $('#basket').click(function(){
        $('.popup-basket').addClass('active');
    });

    // $(document).mouseup(function (e){ // событие клика по веб-документу
    //     var pop = $(".mobile-popup-basket"); // тут указываем ID элемента
    //     if (!pop.is(e.target) // если клик был не по нашему блоку
    //         && pop.has(e.target).length === 0) { // и не по его дочерним элементам
    //         $('.mobile-popup-basket').removeClass('active');
    //     }
    //     });

    $('#js-office-head-btn').click(function() {
        // $('.private-office-head').toggleClass('active');
        if($('.private-office-head').hasClass('active')) {
            $('.private-office-head').removeClass('active');
            $('#js-office-head-btn').removeClass('active');
        } else {
            $('.private-office-head').addClass('active');
            $('#js-office-head-btn').addClass('active');
        }
    });

    // $('#btn-filter-category').click(function() {
    //     $('.filter-category').toggleClass('active');
    //     $('#btn-filter-category').toggleClass('active');
    // });
    // $('#btn-filter-brand').click(function() {
    //     $('.filter-brand').toggleClass('active');
    //     $('#btn-filter-brand').toggleClass('active');
    // });
    // $('#btn-filter-price').click(function() {
    //     $('.filter-price').toggleClass('active');
    //     $('#btn-filter-price').toggleClass('active');
    // });
    // $('#js-alphabet').click(function(){
    //     $('#js-alphabet').toggleClass('active');
    //     if(!$('#js-alphabet').hasClass('active')) {
    //         $('.lower-block').removeClass('active');
    //     } else {
    //         $('.lower-block').addClass('active');
    //     }
    // });

    //var countLi = $('ul.alphabet-close li').length;
    //var countLi = 0;
    //var countLi = $(function(){
    //    $(".alphabet-close").each(function(indx, el){
    //        $('li',el).length;
    //    });
    //});
    //var countLi = $('ul.alphabet-close li').length;
    //var heightUl = countLi / 3;
    //if(Number.isInteger(heightUl) == true){
    //    heightUl = (heightUl * (26.5 + 9)) + 18;
    //    $(".alphabet-close").css({'height': heightUl});
    //}else{
    //    heightUl = (Math.ceil(heightUl) * (26.5 + 9)) + 18;
    //    $(".alphabet-close").css({'height': heightUl});
    //}

    //$(".lower-block").find('li').hover(
    $(".lower-block").find('.letter').hover(
        function() {
            var countLi = $(this).find('ul.alphabet-close > li').length;
            var heightUl = countLi / 3;
            if(Number.isInteger(heightUl) == true){
                heightUl = (heightUl * (26.5 + 9)) + 18;
                $(".alphabet-close").css({'height': heightUl});
            }else{
                heightUl = (Math.ceil(heightUl) * (26.5 + 9)) + 18;
                //if(countLi == 2 || countLi == 4){
                //    $(".alphabet-close").css({'align-content': 'flex-start'});
                //}
                $(".alphabet-close").css({'height': heightUl});
            }
        }
    );

    //$(".lower-block").find('.letter')
    //    function() {
    //    }
    //);
    //$('#products-catalog.item', this).each(function() {
    //    // найти высоту элемента
    //    var heightH = $(this).find('h3').height();
    //    var heightI = $(this).find('.item-body').height();
    //
    //    //  присвоить эту высоту всем элементам с классом live_view.
    //    if(heightH >= 80){
    //        $(".buy-block-list").css({'height': 'auto'});
    //    }else{
    //        var heightBuy = heightI - 26 - heightH - 10;
    //        alert(heightBuy);
    //        $(".buy-block-list").css({'height': heightBuy});
    //    }
    //    //$('.live_view').css('height', height);
    //});

    /* Показать все - Список подкатегорий */
    $('#show-all').click(function(){
        //var subCatLength = $(this).find('#sub-categories-items li').length;
        $('#sub-categories-items').addClass('active');
        $('#show-all').addClass('hide');
        //$('#mobile-bg').addClass('active');
    });

    $('#views').find('span').click(function(){
        if(!$('.menu-catalog-close').hasClass('menu-catalog-active')) {
            $('.menu-catalog-close').addClass('menu-catalog-active');
            var heightMegaM = $('.menu-catalog-active').outerHeight();
            //alert(heightMegaM);
            $(".mega-menu").css({'height': heightMegaM});
            //$(".mega-menu > ul").css({'height': heightMegaM - 40});
        } else {
            $('.menu-catalog-close').removeClass('menu-catalog-active');
        }
    });

    /* Очищаем атрибут value поля ПОИСКА (очищаем строку поиска по нажатию на крестик)*/
    //Кажется это всё не заработает без Ajax
    // if ($("#search").find('input:text').val("")) {
    //     $('.search-close').removeClass('active');
    // }
    // else{
    //     $('.search-close').addClass('active');
    // }

    // $("#search").on("focus", function(){
    //     $("#search").find('.search-close').click(function() {
    //         $("#search").find("input[type=text]").val("");
    //     });
    // });

    $('#clear-search').on('click', function()
    {
        $('#search').find('input:text').val('');
    });

    // Получаем ссылку на ..., изменение которого будем отслеживать.
    var productsCatalog = document.getElementById("products-catalog") || {};
    var viewTile = document.getElementById("tile") || {};
    var viewList = document.getElementById("list") || {};
    if ( localStorage.classCatalog ) {
        productsCatalog.className = localStorage.classCatalog;
    }
    if ( localStorage.classTile ) {
        viewTile.className = localStorage.classTile;
        viewList.className = localStorage.classList;
    }
    if ( localStorage.classList ) {
        viewList.className = localStorage.classList;
        viewTile.className = localStorage.classTile;
    }
    $('#tile').click(function(){
        if(!$('#products-catalog').hasClass('.tile')) {
            $('#products-catalog').prop('className','tile');
            // $('#products-catalog').addClass('tile').removeClass('list').removeClass('table');
            $('#tile').addClass('active');
            $('#list').removeClass('active');
            localStorage.classCatalog = productsCatalog.className;
            localStorage.classTile = viewTile.className;
            localStorage.classList = viewList.className;
        }
    });
    $('#list').click(function(){
        if(!$('#products-catalog').hasClass('.list')) {
            $('#products-catalog').prop('className','list');
            // $('#products-catalog').addClass('list').removeClass('tile').removeClass('table');
            $('#list').addClass('active');
            $('#tile').removeClass('active');
            localStorage.classCatalog = productsCatalog.className;
            localStorage.classList = viewList.className;
            localStorage.classTile = viewTile.className;
        }
    });
    // $('#table').click(function(){
    //     if(!$('#table').hasClass('.table')) {
    //         $('#products-catalog').addClass('table').removeClass('tile').removeClass('list');
    //     }
    // });



    $('.slick-slider').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.related-products').on('setPosition', function () {
        $(this).find('.slick-slide').height('auto');
        var slickTrack = $(this).find('.slick-track');
        var slickTrackHeight = $(slickTrack).height();
        $(this).find('.slick-slide').css('height', slickTrackHeight + 'px');
    });

    $('.multiple-items').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 8,
        slidesToScroll: 8,
        arrows: true,
        // autoplay: true,
        // autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    infinite: true,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });

    $('.single-item').slick({
        infinite: true,
        dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 5000,
    });

    $('#promo-section').on('setPosition', function () {
        var heightSl = $(this).find('.slick-list').height();
        // alert(height);
        $(this).find('.promo-block').css({height: heightSl, overflow: 'hidden'});
    });

    $('.product-slider').slick({
        infinite: true,
        dots: true,
        arrows: true,
    });

    $('.slick-carousel').slick({
        infinite: true,
        speed: 300,
        slidesToShow: 5,
        slidesToScroll: 5,
        arrows: true,
        // autoplay: true,
        // autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.slick-carousel').on('setPosition', function () {
        $(this).find('.slick-slide').height('auto');
        var slickTrack = $(this).find('.slick-track');
        var slickTrackHeight = $(slickTrack).height();
        $(this).find('.slick-slide').css('height', slickTrackHeight + 'px');
    });

    var input = $("form").find("input[type='text']");
    if ('placeholder' in input) {
        $(input).find('label').css('color', 'red');
    }

    //Включаем/выключаем checkbox-ы по нажатию на кнопку "Все"
    $("#checkall").click( function() {
        var checkBoxes = $("input[name=subcategories\\[\\]]");
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
    });
    $("#checkallTrademarks").click( function() {
        var checkBoxes = $("input[name=trademarks\\[\\]]");
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
    });



    //$('.etc-table').click(function(){
    //    if(!$('.btns-table').hasClass('active')) {
    //        $('.btns-table').addClass('active');
    //    }else{
    //        $('.btns-table').removeClass('active')
    //    }
    //});
    //$('span[name*="etc-table"]').on('click', function(e) {
    //    $('span[name*="etc-table"]').each(function() {
    //        if ($(this).hasClass('active')) {
    //            $('.btns-table').addClass('active');
    //        }else{
    //        $('.btns-table').removeClass('active')
    //    }
    //    });
    //
    //
    //});

    /* Set rates + misc */
    var taxRate = 0.05;
    var shippingRate = 15.00;
    // var fadeTime = 300;
    var fadeTime = 100;

    /* Удаляем товар из корзины */
    // $('.basket').find('.icon-close').click( function() {
    $(document).on('click', '.icon-close', function () {
        removeItem(this);
    });

    /* Remove item from cart */
    function removeItem(removeButton)
    {
        /* Remove row from DOM and recalc cart total */
        var productRow = $(removeButton).closest('.basket-item');
        // productRow.css({'border': '2px solid red'});
        productRow.slideUp(fadeTime, function() {
            productRow.remove();
            recalculateCart();
        });

        // получаем массив данных (наша корзина - id товара и количество) cart - object
        var cart = JSON.parse (localStorage.getItem('cart'));
        //определяем id элемента, который удаляем из массива cart
        var deleteId = $(removeButton).attr('data-id-delete');

        // alert(deleteId);
        // var newCart = cart.splice(cart[deleteId], 1);
        delete cart[deleteId];
        console.log( cart );
        localStorage.setItem('cart', JSON.stringify(cart));

        checkCart();

    }
    /* Если произошли изменения в input, то вызываем функцию*/
    // $('.quantity input').change( function() {
    //     updateQuantity(this);
    // });
    $(document).on('change', '.quantity input', function () {
        updateQuantity(this);
    });

    $(document).on('click', '.less', function () {
        var $input = $(this).parent().find("input");
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
    });

    $(document).on('click', '.more', function () {
        var $input = $(this).parent().find("input");
        var count = parseInt($input.val()) + 1;
        $input.val(count);
        $input.change();
    });
    // var productRow = $('.quantity input').parent().parent().parent();
    // productRow.find('.price-here').css({'color': 'aqua'});
    // productRow.find('.total').css({'color': 'aqua'});

    /* Обновить количество */
    function updateQuantity(quantityInput)
    {
        /* Calculate line price */
        var productRow = $(quantityInput).closest('.basket-item');
        var priceHere = productRow.find('.price-here');
        priceHere.css({'color': 'green'});

        var price = parseFloat(priceHere.html()).toFixed(2);
        // alert( parseFloat(priceHere.html()) );
        var quantity = $(quantityInput).val();
        quantity = parseInt(quantity);
        if(isNaN(quantity) === true || quantity <= 0){
            quantity = 1;
            $(quantityInput).val(quantity);
            // alert(quantity);
            // return quantity;
        }
        // alert(quantity);
        var linePrice = (price * quantity).toFixed(2);

        /** **/
        // var productQuantity = $(quantityInput).parent().parent().parent().parent();
        // productQuantity.find('.price-here').css({'color': 'aqua'});
        // var productPriceHere = productQuantity.find('.price-here');

        /* Update line price display and recalc cart totals */
        productRow.find('.total').each(function () {
            $(this).html(linePrice);
            recalculateCart();
            // $(this).fadeOut(fadeTime, function() {
            //   $(this).text(linePrice.toFixed(2));
            //   recalculateCart();
            //   $(this).fadeIn(fadeTime);
            // });
        });
    }

    /* Recalculate cart */
    function recalculateCart()
    {
        var subtotal = 0;
        var subtotalpop = 0;

        /* Sum up row totals */
        $('.basket-total').each(function () {
            $(this).find('.total').css({'color': 'blue'});
            subtotal += parseFloat($(this).find('.total').text());

            $(this).closest('.basket').find('.amount').css({'color': 'aqua'});
            $(this).closest('.basket').find('.amount').html(subtotal.toFixed(2));
        });

        $('.basket-total-pop').each(function () {
            $(this).find('.total').css({'color': 'orange'});
            subtotalpop += parseFloat($(this).find('.total').text());
            // alert(subtotal);
            $(this).closest('.popup-basket').find('.amount').css({'color': 'aqua'});
            $(this).closest('.popup-basket').find('.amount').html(subtotalpop.toFixed(2));
        });

    }



    // направление сортировки
    $(document).on('click', '.sort-direction', function (e) {
        var value = $(this).data('value');
        // addLoader('.outer');
        sortingAjax('direction', value);
        $('.sort-direction').removeClass('active');
        $('.sort-direction[data-value="'+ value +'"]').addClass('active');
    });
    // сортировка
    $(document).on('change', '.ajax-sort', function (e) {
        $('#filters-form-category').not(':submit').clone().hide().appendTo('#sortby-form');
        $('#sortby-form').submit();
    });

    // selectRegion();

    // function selectRegion() {
    //     if($("#ch-region option:selected").val() == 0){
    //         document.getElementById('ch-city').setAttribute("disabled", "disabled");
    //         // alert('фигня');
    //     }
    //     else{
    //         document.getElementById('ch-city').removeAttribute("disabled");
    //         // alert('не фигня');
    //     }
    // }

    $(document).on('change', '#ch-region', function (e) {
        var regionId = $("#ch-region option:selected").val();
        console.log( regionId );

        $.ajax({
            type: "POST",
            data: {},
            url: "/city-by-region/" + regionId,
            dataType: "json", // тип данных возвращаемых в callback-функцию
            async: true,
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function ( data ) {
                $('#ch-city').empty().html(data.resultHtml);
                // selectRegion();
            }
        });

    });

    $(document).on('change', '#ch-city', function (e) {
        var cityId = $("#ch-city option:selected").val();
        console.log(cityId);

        $.ajax({
            type: "POST",
            data: {},
            url: "/delivery-by-city/" + cityId,
            dataType: "json", // тип данных возвращаемых в callback-функцию
            async: true,
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function ( data ) {
                $('#ch-delivery').empty().html(data.resultHtml);
                // selectRegion();
            }
        });
    });

    // создаем обработичик события клик по кнопке "Купить" у товара
    // при клике будет вызвана функция - addToCart
    $('.add-to-cart').on('click', addToCart);



}); //закончился document ready function

$(document).on('click', '.clear-cart', clearCart);

var cartItems = localStorage.getItem('cart').length || 0;

function clearCart(){
    localStorage.removeItem('cart');
    $('#page-cart-content').html('Корзина очищена');
    $('#widget-cart-content').html('Корзина очищена');
}

function addToCart(){
    // alert('ура');
    // добавляем товар в корзину
    // Наша задача: при нажатии на кнопку «Купить» товары должны быть добавлены в какое-то промежуточное хранилище.
    // Мы добавим в localStorage. Данные будут храниться в виде массива. Нам нужно хранить такие элементы: id товара,
    // актуальная на момент покупки цена, его количество
    // чтобы добавить элемент в массив указываем имя массива, а далее ключ и значение
    var articul = $(this).attr('data-art'); // в данном случае this – это кнопка на которую нажали
    //проверяем существует ли в ближайщем селекторе item элемент input
    if($(this).closest('.item').find("input").length){
        var $input = $(this).closest('.item').find("input");
        var count = $input.val(); // получаем количество товара из input
    }else{
        var count = 1;
    }

    // var priceHere = $(this).closest('.item').find(".price-here");
    // var price = parseFloat(priceHere.html()).toFixed(2); // получаем актуальную стоимость единицы товара
    // console.log( price );
    ////Теперь нужно проверить есть ли такой элемент в корзине, и если он есть – увеличить его количество.
    // !=undefined – проверяем, существует ли в корзине товар с таким артикулом. Если существует увеличиваем его значение на единицу
    if(cart[articul]!=undefined){
        // cart[articul]++;
        cart[articul] = [parseInt(cart[articul]) + parseInt(count)];
        // cart[articul] = [parseInt(cart[articul]) + parseInt(count)];
        // cart[articul] = [price];
    }else{
        // cart[articul] =  1;
        cart[articul] =  [parseInt(count)];
        // cart[articul] =  [parseInt(count), price];
        // cart[articul] =  [price];
    }
    // console.log( count );
    // Теперь эту информацию нужно записать в localStorage браузера
    // localStorage – по сути таблица, в которой есть имя записи и её значение. Значением localStorage могут быть только строки
    // JSON.stringify – получает массив, а на выходе выдает строку
    localStorage.setItem('cart', JSON.stringify(cart)) // первым параметром идёт имя записи, вторым – значение
    checkCart();
    showMiniCart(); // в самом низу
}

// Теперь нужно проверить есть ли что-то в localStorage, и если есть присвоить массиву cart это значение, если нет – создать пустой массив
function checkCart(){
    //проверяю наличие корзины в localStorage
    // (localStorage.getItem('cart').length || 0) != cartItems
    if( localStorage.getItem('cart') != null){ // если в localStorage что-то есть (не равно null)
        cart = JSON.parse (localStorage.getItem('cart')); // преобразуем строку в массив и добавляем в массив cart (т.е. выводим данные из localStorage)

        // var isCartPage = isCartPage || false;
        var isCartPage = true;
        $.ajax({
            data: {cart: localStorage.getItem('cart'), 'is_cart_page': isCartPage}, // если на странице корзины передавать isCartPage: true
            type: "POST",
            dataType: "json", // тип данныхвозвращаемых в callback-функцию
            url: "/basket", //url запрашиваемой страницы ???
            async: true,
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
            },
            success: function(data) {
                $('#widget-cart-content').html(data.widgetCartContentHtml);
                if(data.pageCartContentHtml) {
                    $('#page-cart-content').html(data.pageCartContentHtml);
                }
            }
        });
    }
}

// изменение количества в localStorage
$('#widget-cart-content, #page-cart-content').on('change', '.quantity input', function () {
    var count = $(this).val(); // получаем количество товара из input

    // преобразуем строку в массив и добавляем в массив cart (т.е. выводим данные из localStorage)
    var cart = JSON.parse (localStorage.getItem('cart'));
    var articul = $(this).attr('data-id');

    if(cart && cart[articul]){
        cart[articul] = [parseInt(count)];
        localStorage.setItem('cart', JSON.stringify(cart)) // первым параметром идёт имя записи, вторым – значение
        checkCart();
        // recalculateCart();

        var subtotal = 0;

        /* Sum up row totals */
        $('.basket-total').each(function () {
            $(this).find('.total').css({'color': 'blue'});
            subtotal += parseFloat($(this).find('.total').text());

            $(this).closest('.basket').find('.amount').css({'color': 'aqua'});
            $(this).closest('.basket').find('.amount').html(subtotal.toFixed(2));

        });

    }
});

function showMiniCart() {
    // показываю содержимое корзины
    var out = ' ';
    for (var w in cart){
        out += w + ' --- '	+cart[w]+'<br>';
    }
    $('#mini-cart').html(out);
}

// Далее необходимо извлечь данные из localStorage и по артикулам (коду товара) получить все необходимые данные
// о товаре из базы данных
// function checkCart(){
//     //проверяю наличие корзины в localStorage
//     if( localStorage.getItem('cart') != null){ // если в localStorage что-то есть (не равно null)
//         cart = JSON.parse (localStorage.getItem('cart')); // преобразуем строку в массив и добавляем в массив cart (т.е. выводим данные из localStorage)
//     }
//     console.log( localStorage.getItem('cart') );
// }