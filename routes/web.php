<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
 * Autorization
 */
Auth::routes();
Route::get('logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');
// Activation user.
Route::get('activate/{id}/{token}', '\App\Http\Controllers\Auth\RegisterController@activation')->name('activation');

Route::group(['prefix' => 'cabinet', 'as' => 'cabinet.', 'middleware' => ['web','auth']], function () {

    Route::get('/', ['as' => 'index', 'uses' => 'CabinetController@index']);

});
/*
 * Users
 */
//Route::get('users', ['as' => 'users', 'uses' => 'UsersController@users']);

/*
 * Ajax requests
 */
Route::post('send_letter', ['as' => 'contact.sendLetter', 'before' => 'csrf-ajax', 'uses' => 'PagesController@sendLetter']);

Route::get('search', ['as' => 'search', 'uses' => 'SearchController@index']);
// Корзина
Route::get('basket', ['as' => 'basket', 'uses' => 'PagesController@basket']);
Route::post('basket', ['as' => 'basket.getProducts', 'uses' => 'PagesController@getBasketProducts']);
// Оформление заказа
Route::get('checkout', ['as' => 'checkout', 'uses' => 'PagesController@checkout'])->name('checkout');
Route::post('city-by-region/{regionId}', ['as' => 'cityByRegion', 'uses' => 'PagesController@cityByRegion']);
Route::post('delivery-by-city/{$cityId}', ['as' => 'deliveryByCity', 'uses' => 'PagesController@deliveryByCity']);

Route::post('send_checkout', ['as' => 'checkout.sendCheckout', 'before' => 'csrf-ajax', 'uses' => 'PagesController@sendCheckout']);


Route::get('trade-marks/{trademarkAlias}', ['as' => 'trademark', 'uses' => 'PagesController@trademarkPage']);


Route::get('/', ['uses' => 'PagesController@index']);


Route::get('sitemap.xml', ['as' => 'sitemapXml', 'uses' => 'PagesController@sitemapXml']);

Route::get('{parentOne}/{parentTwo}/{parentThree}/{page}', ['uses' => 'PagesController@pageFourLevel'])->name('product');
Route::get('{parentOne}/{parentTwo}/{page}', ['uses' => 'PagesController@pageThreeLevel']);
Route::get('{parentOne}/{page}', ['uses' => 'PagesController@pageTwoLevel']);
Route::get('{page}', ['uses' => 'PagesController@pageOneLevel']);