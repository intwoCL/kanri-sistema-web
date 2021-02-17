<?php

use Illuminate\Support\Facades\Route;

Route::get('prueba1', function () {
    return view('example.uno');
});

Route::get('/', function () {
    return view('auth.index');
});
Route::post('login', 'Auth\AuthUserController@login')->name('login');
Route::resource('user', 'System\UserController');

Route::get('tabla', function () {
  return view('tabla');
});

Route::get('/debug-sentry', function () {
  throw new Exception('My first Sentry error!');
});

// Route::namespace('Inventary')->group(function () {
//   Route::prefix('evento')->group(function () {

//   });
//   Route::get('category', 'CategoryController@index')->name('category.index');
//   Route::get('category/create', 'CategoryController@create')->name('category.create');
//   Route::post('category', 'CategoryController@store')->name('category.store');
// });

// Route::resource('category', 'Inventary\CategoryController',['except'=>['destroy','show','edit','update']]);

Route::middleware('auth.user')->group(function () {
  Route::get('signOut', 'Auth\AuthUserController@signOut')->name('signOut');
  Route::get('utils', 'UtilsController@index')->name('utils.index');

  Route::get('home', 'Auth\AuthUserController@home')->name('home');
  Route::resource('category', 'Inventary\CategoryController');
  Route::resource('types', 'Inventary\ProductTypeController');
  Route::resource('unit', 'Inventary\UnitController');
  Route::resource('product', 'Inventary\ProductController');

  //Proveedor
  Route::resource('provider', 'System\ProviderController');
  Route::get('/provider/{id}/products', 'System\ProviderController@products')->name('provider.products.create');
  Route::post('/provider/{id}/products', 'System\ProviderController@productStore')->name('provider.products.store');
  Route::delete('/provider/{id}/products', 'System\ProviderController@productDestroy')->name('provider.products.destroy');

  //PurchaseOrder

  //Index
  Route::get('/provider/{provider_id}/order', 'System\ProviderController@order')->name('provider.order');

  //Create y Post
  Route::get('/provider/{provider_id}/order/create', 'PurchaseOrder\PurchaseOrderController@create')->name('order.create');
  Route::post('/provider/{provider_id}/order', 'PurchaseOrder\PurchaseOrderController@store')->name('provider.order.store');

  //Edit y Update
  Route::get('/provider/{provider_id}/order/{order_id}/edit', 'PurchaseOrder\PurchaseOrderController@edit')->name('order.edit');
  Route::put('/provider/{provider_id}/order/{order_id}', 'PurchaseOrder\PurchaseOrderController@update')->name('order.update');

  //Show
  Route::get('/provider/{provider_id}/order/{order_id}','PurchaseOrder\PurchaseOrderController@show')->name('order.show');

  //Destroy
  Route::delete('/provider/{provider_id}/order/{order_id}', 'PurchaseOrder\PurchaseOrderController@destroy')->name('order.destroy');

  //PDF
  Route::get('imprimir-orden-compra/provider/{provider_id}/order/{order_id}', 'PurchaseOrder\PurchaseOrderController@print')->name('provider.order.print');

  Route::get('mostrar-order-compra/provider/{provider_id}/order/{order_id}', 'PurchaseOrder\PurchaseOrderController@preview')->name('provider.order.preview');

  //OrderDetails
  Route::get('provider/{id}/order/{purchase_id}/detail', 'PurchaseOrder\OrderDetailController@create')->name('provider.order.details');

  Route::post('provider/{id}/order/{purchase_id}/detail', 'PurchaseOrder\OrderDetailController@store')->name('provider.order.details.store');

  Route::delete('provider/{id}/order/{purchase_id}/detail', 'PurchaseOrder\OrderDetailController@destroy')->name('provider.order.details.destroy');

  Route::post('/provider/{id}/order/{purchase_id}/recalculated', 'PurchaseOrder\PurchaseOrderController@recalculated')->name('provider.order.recalculated');


  //Usuarios y Clientes
  Route::resource('user', 'System\UserController');
  Route::resource('client', 'System\ClientController');

  //Budget
  Route::resource('budget', 'Budget\BudgetController');
  Route::get('budget/{id}/service', 'Budget\ServiceBudgetController@create')->name('budget.service');
  Route::post('budget/{id}/service', 'Budget\ServiceBudgetController@store')->name('budget.service.store');
  Route::delete('budget/{id}/service', 'Budget\ServiceBudgetController@service')->name('budget.service.destroy');
  Route::get('budget/{id}/products', 'Budget\ProductBudgetController@create')->name('budget.products');
  Route::post('budget/{id}/products', 'Budget\ProductBudgetController@store')->name('budget.products.store');
  Route::delete('budget/{id}/products', 'Budget\ProductBudgetController@destroy')->name('budget.products.destroy');
  Route::post('budget/{id}/recalculated', 'Budget\BudgetController@recalculated')->name('budget.recalculated');
  Route::get('imprimir-pdf/{id}', 'Budget\BudgetController@imprimir')->name('imprimir');
  Route::get('mostrar-pdf/{id}', 'Budget\BudgetController@preview')->name('preview');
});
// Route::get('login','Auth\AuthUserController@index')->name('index');
// Route::post('app','Auth\AuthUserController@login')->name('login');

// Route::get('category', 'Inventary\CategoryController@index')->name('category.index');
// Route::get('category/create', 'Inventary\CategoryController@create')->name('category.create');
// Route::post('category', 'Inventary\CategoryController@store')->name('category.store');