<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('https://webgunea.jangou.eus');
    //return view('logo');
});

Route::get('/Splash', function () {
    return view('splash');
})->middleware('is_android')->middleware('is_ios');


Auth::routes(['verify' => true]);
Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Views
|--------------------------------------------------------------------------
*/

Route::get('/taberna/create', function () {
    return view('Admin.create_bar');
})->middleware('is_create')->middleware(['verified'])->middleware('auth');

Route::get('/foodcard/upload', function () {
    return view('Admin.food_card_upload');
})->name('cards')->middleware('is_not_create')->middleware(['verified'])->middleware('auth');

Route::get('/taberna/update', function () {
    return view('Admin.update_bar');
})->name('cards')->middleware('is_not_create')->middleware(['verified'])->middleware('auth');


Route::get('/password/change', function () {
    return view('Admin.passwordChange');
})->name('passChange')->middleware(['verified'])->middleware('auth');

Route::get('/help', function () {
    return view('Admin.lagunChat');
})->name('lagunChat')->middleware(['verified'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| Images
|--------------------------------------------------------------------------
*/
Route::post('/image/upload', 'ImagesController@saveImage')->name('saveImage');
Route::post('/image/delete', 'ImagesController@deleteImage')->name('deleteImage');
Route::post('/image/card/upload', 'ImagesController@saveCardImage')->name('saveCardImage');
Route::post('/image/card/delete', 'ImagesController@deleteCardImage')->name('deleteCardImage');
Route::get('/image/request', 'ImagesController@getImagesByIdTaberna')->name('getImagesByIdTaberna');


/*
|--------------------------------------------------------------------------
| KEY
|--------------------------------------------------------------------------
*/
Route::post('/key/generate', 'KeyController@generateKey')->name('generateKey');

/*
|--------------------------------------------------------------------------
| Taberna
|--------------------------------------------------------------------------
*/
Route::post('/taberna/create', 'TabernaController@createTaberna')->name('createTaberna');
Route::get('/taberna/get/idtaberna', 'TabernaController@getTabernaID')->name('getTabernaID');
Route::get('/taberna/get/taberna', 'TabernaController@getTaberna')->name('getTaberna');
Route::post('/taberna/update', 'TabernaController@updateTaberna')->name('updateTaberna');

/*
|--------------------------------------------------------------------------
| Description
|--------------------------------------------------------------------------
*/
Route::post('/description/create', 'DescriptionController@createDescription')->name('createDescription');
Route::get('/description/get', 'DescriptionController@getDescriptions')->name('getDescriptions');
Route::post('/description/update', 'DescriptionController@updateDescription')->name('updateDescription');



/*
|--------------------------------------------------------------------------
| Timetable
|--------------------------------------------------------------------------
*/
Route::post('/timetable/create', 'TimetableController@createTimetable')->name('createTimetable');
Route::get('/timetable/get', 'TimetableController@getTimetables')->name('getTimetables');
Route::post('/timetable/update', 'TimetableController@updateTimetable')->name('updateTimetable');

/*
|--------------------------------------------------------------------------
| MoreInfo
|--------------------------------------------------------------------------
*/
Route::post('/moreinfo/create', 'MoreInfoController@createMoreInfo')->name('createMoreInfo');
Route::get('/moreinfo/get', 'MoreInfoController@getMoreInfo')->name('getMoreInfo');
Route::post('/moreinfo/update', 'MoreInfoController@updateMoreInfo')->name('updateMoreInfo');

/*
|--------------------------------------------------------------------------
| Request
|--------------------------------------------------------------------------
*/
Route::post('/request/create', 'RequestController@createRequest')->name('createRequest');
Route::get('/request/get', 'RequestController@getRequests')->name('getRequests');
Route::post('/request/delete', 'RequestController@deleteRequests')->name('deleteRequests');

/*
|--------------------------------------------------------------------------
| Pay Procediment
|--------------------------------------------------------------------------
*/
Route::post('/pay/create', 'PayController@createPay')->name('createPay');
Route::get('/pay/get', 'PayController@getPay')->name('getPay');
Route::post('/pay/delete', 'PayController@deletePay')->name('deletePay');

/*
|--------------------------------------------------------------------------
| Service
|--------------------------------------------------------------------------
*/
Route::post('/service/create', 'ServiceController@createService')->name('createService');
Route::get('/service/get', 'ServiceController@getService')->name('getService');
Route::post('/service/delete', 'ServiceController@deleteService')->name('deleteService');
/*
|--------------------------------------------------------------------------
| PDF
|--------------------------------------------------------------------------
*/

Route::get('/pdf', function () {
    return view('pdf');
})->name('pdf');
Route::post('/pdf/download','PdfController@downloadPdf')->name('downloadpdf');
Route::post('/pdf/see','PdfController@seePdf')->name('seepdf');
Route::get('/pdf/see/{idTaberna}','PdfController@seepdf')->name('seepdfGET');

/*
|--------------------------------------------------------------------------
| CHANGE PASSWORD
|--------------------------------------------------------------------------
*/
Route::post('/changePass','UserController@changePass')->name('changePass');

/*
|--------------------------------------------------------------------------
| CHANGE LOCALE
|--------------------------------------------------------------------------
*/
Route::get('lang/{lang}',
    function ($lang)
    {
        session()->put('locale', $lang);
        App::setLocale($lang);
        return redirect()->back();
    }
)->name('lang.swap');


/*
|--------------------------------------------------------------------------
| LAGUNTXAT
|--------------------------------------------------------------------------
*/

Route::post('/telegram/send','TelegramController@sendTelegramMezua')->name('sendTelegram')->middleware(['verified']);
Route::post('/telegram/error','TelegramController@sendTelegramError')->name('sendTelegramError')->middleware(['verified']);


