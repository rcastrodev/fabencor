<?php

use App\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');
Route::get('/empresa', 'PagesController@empresa')->name('empresa');
Route::get('cajas-medidas-especiales', 'PagesController@cajasMedidasEspeciales')->name('cajas-medidas-especiales');
Route::get('/cajas-medidas-especiales/{id}', 'PagesController@productoCajasMedidasEspeciales')->name('producto');
Route::get('/productos', 'PagesController@productos')->name('productos');
Route::get('cajas-medidas-estandart', 'PagesController@cajasMedidasEstandart')->name('cajas-medidas-estandart');
Route::get('rollos-corrugados-simple-faz', 'PagesController@rollosCorrugadosSimpleFaz')->name('rollos-corrugados-simple-faz');
Route::get('/solicitar-presupuesto', 'PagesController@solicitudDePresupuesto')->name('solicitud-de-presupuesto');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');

Route::post('enviar-cotizacion', 'MailController@quote')->name('send-quote');
Route::post('enviar-cotizacion/cajas-medidas-estandart', 'MailController@cajasMedidasEstandart')->name('cajas-medidas-estandart.mail');
Route::post('enviar-cotizacion/cajas-especiales', 'MailController@cajasEspeciales')->name('cajas-especiales.mail');
Route::post('enviar-cotizacion/corrugado', 'MailController@corrugado')->name('corrugado.mail');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');
Route::post('newsletter', 'NewsLetterController@storeNewsletter')->name('newsletter.store');
Route::get('/ficha-tecnica/{id}', 'PagesController@fichaTecnica')->name('ficha-tecnica');
Route::delete('/ficha-tecnica/{id}', 'PagesController@borrarFichaTecnica')->name('borrar-ficha-tecnica');

Route::post('vp', 'VPController@addVP')->name('vp.store');
Route::delete('vp/{id}', 'VPController@destroy')->name('vp.destroy');
Route::get('cache', function () {
    Artisan::call('config:cache');
});


Route::middleware('auth')->prefix('admin')->group(function () {

    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@store')->name('home.content.store');
    Route::post('home/content/generic-section/update', 'HomeController@update')->name('home.content.update');
    Route::post('home/content/update', 'HomeController@updateSection')->name('home.content.update-section');
    Route::delete('home/content/{id}', 'HomeController@destroy')->name('home.content.destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/

    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/qualities/store', 'CompanyController@createInfo')->name('company.info.store');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::post('company/content/generic-section/update', 'CompanyController@updateHomeGenericSection')->name('company.content.generic-section.update');
    Route::delete('company/content/{id}', 'CompanyController@destroySlider')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    Route::get('company/content/galery/get-list', 'CompanyController@galeryGetList')->name('company.galery.get-list');
    Route::get('company/content/qualities/get-list', 'CompanyController@qualitiesGetList')->name('company.qualities.get-list');
    /** Fin company*/

    /** Page Category */
    Route::get('category/content', 'CategoryController@content')->name('category.content');
    Route::post('category/content/store', 'CategoryController@store')->name('category.content.store');
    Route::post('category/content', 'CategoryController@update')->name('category.content.update');
    Route::get('category/content/find/{id?}', 'CategoryController@find')->name('category.content.find');
    Route::delete('category/content/{id}', 'CategoryController@destroy')->name('category.content.destroy');
    Route::get('category/content/get-list', 'CategoryController@getList');
    /** Fin category*/

    /** Page Product */
    Route::get('product/content', 'ProductController@content')->name('product.content');
    Route::get('product/content/create', 'ProductController@create')->name('product.content.create');
    Route::post('product/content/store', 'ProductController@store')->name('product.content.store');
    Route::get('product/content/{id}/edit', 'ProductController@edit')->name('product.content.edit');
    Route::put('product/content', 'ProductController@update')->name('product.content.update');
    Route::delete('product/content/{id}', 'ProductController@destroy')->name('product.content.destroy');
    Route::get('product/content/get-list', 'ProductController@getList')->name('product.content.get-list');
    Route::get('product/content/find-product/{id?}', 'ProductController@find')->name('product.content.find');
    Route::delete('product/description-image/{id}/{field}', 'ProductController@destroyDescriptionImage')->name('product.destroy.descriptionImage');
    Route::get('product/cajas-medidas-estandart', 'ProductController@cajasMedidasEstandart')->name('product.cajas-medidas-estandart');
    Route::get('product/rollos-corrugados-simple-faz', 'ProductController@rollosCorrugadosSimpleFaz')->name('product.rollos-corrugados-simple-faz');
    /** Fin product*/

    /** Page Product variable */
    Route::post('variable-product/content/store', 'VariableProductController@store')->name('variable-product.content.store');
    Route::post('variable-product/content', 'VariableProductController@update')->name('variable-product.content.update');
    Route::delete('variable-product/content/{id}', 'VariableProductController@destroy')->name('variable-product.content.destroy');
    /** Fin product variable*/
    
    /** Page Product Picture */
    Route::delete('product-picture/content/destroy/{id}', 'ProductPictureController@destroy')->name('product-picture.content.destroy');
    /** Fin product picture*/

    /** Page company */
    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    /** Fin company*/

    Route::get('page/content', 'AdminPageController@content')->name('page.content');
    Route::put('page/content', 'AdminPageController@update')->name('page.content.update');

    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');
    Route::post('content/hero-update', 'ContentController@heroUpdate')->name('content.hero-update');
    Route::delete('content/image/{id}/{reg}', 'ContentController@destroyImage')->name('content.destroy-image');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
