<?php
/**
 */
/* Image upload for TinyMCE */
//Route::post('upload_into_temp', ['as' => 'uploadIntoTemp', 'before' => 'csrf-ajax', 'uses' => 'ImageUploadController@uploadIntoTemp']);
//Route::post('delete_from_temp', ['as' => 'deleteFromTemp', 'before' => 'csrf-ajax', 'uses' => 'ImageUploadController@deleteFromTemp']);
Route::group(['module' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['web','admin'], 'namespace' => 'Modules\Admin\Controllers'], function () {

    Route::get('/', ['as' => 'index', 'uses' => 'AdminController@index']);

    Route::post('products/delete', ['as' => 'products.deleteSelected', 'uses' => 'ProductsController@deleteSelected']);
    Route::resource('products', 'ProductsController', ['except' => ['show']]);

//    Route::post('products/parser', ['as' => 'products.parser', 'uses' => 'ProductsController@parser']);

//    Route::get('search', ['as' => 'search', 'uses' => 'AdminController@search']);
//
//    Route::post('pages/change_published_status/{id}', ['as' => 'pages.changePublishedStatus', 'uses' => 'PagesController@changePublishedStatus']);
//    Route::get('pages/articles', ['as' => 'pages.articles', 'uses' => 'PagesController@articles']);
//    Route::get('pages/questions', ['as' => 'pages.questions', 'uses' => 'PagesController@questions']);
//    Route::resource('pages', 'PagesController', ['except' => ['show']]);
//
//    Route::resource('comments', 'CommentsController', ['except' => ['show', 'create', 'store']]);
//
//    Route::post('letters/change_important_status/{id}', ['as' => 'letters.changeImportantStatus', 'uses' => 'LettersController@changeImportantStatus']);
//    Route::post('letters/undelete/{id}', ['as' => 'letters.undelete', 'uses' => 'LettersController@undelete']);
//    Route::get('letters/important', ['as' => 'letters.important', 'uses' => 'LettersController@important']);
//    Route::get('letters/trash', ['as' => 'letters.trash', 'uses' => 'LettersController@trash']);
//    Route::resource('letters', 'LettersController', ['except' => ['edit', 'update', 'store', 'create']]);
//
//    Route::post('users/undelete/{id}', ['as' => 'users.undelete', 'uses' => 'UsersController@undelete']);
//    Route::resource('users', 'UsersController');
//
//    Route::get('settings', ['as' => 'settings.index', 'uses' => 'SettingsController@index']);
//    Route::post('settings/upload_image/', ['as' => 'settings.uploadImage', 'uses' => 'SettingsController@uploadImage']);
//    Route::post('settings/delete_image/', ['as' => 'settings.deleteImage', 'uses' => 'SettingsController@deleteImage']);
//    Route::post('settings/set_is_active/', ['as' => 'settings.setIsActive', 'uses' => 'SettingsController@setIsActive']);
//    Route::post('settings/set_value/', ['as' => 'settings.setValue', 'uses' => 'SettingsController@setValue']);
//    Route::get('settings/widgets', ['as' => 'settings.widgets', 'uses' => 'SettingsController@widgets']);
//    Route::get('settings/advanced', ['as' => 'settings.advanced', 'uses' => 'SettingsController@advanced']);
//
//    Route::post('menus/rename', ['as' => 'menus.rename', 'uses' => 'MenusController@rename']);
//    Route::post('menus/delete', ['as' => 'menus.delete', 'uses' => 'MenusController@delete']);
//    Route::post('menus/position', ['as' => 'menus.position', 'uses' => 'MenusController@changePosition']);
//    Route::post('menus/add', ['as' => 'menus.add', 'uses' => 'MenusController@add']);
//    Route::get('menus/autocomplete', ['as' => 'menus.autocomplete', 'uses' => 'MenusController@pagesAutocomplete']);
//
//    Route::get('advertising', ['as' => 'advertising.index', 'uses' => 'AdvertisingController@index']);
});