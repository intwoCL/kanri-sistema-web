<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Auth\AuthUserController@index');
Route::post('login', 'Auth\AuthUserController@login')->name('login');

Route::resource('user', 'System\UserController');
Route::put('user/{id}/password', 'System\UserController@updatePassword')->name('user.password');

Route::get('tabla', function () {
  return view('tabla');
});

Route::get('/debug-sentry', function () {
  throw new Exception('My first Sentry error!');
});

Route::middleware('auth.user')->group(function () {

  Route::namespace('Auth')->group(function () {
    Route::get('signOut', 'AuthUserController@signOut')->name('signOut');
    Route::get('home', 'AuthUserController@home')->name('home');
  });

  Route::get('utils', 'UtilsController@index')->name('utils.index');

  Route::namespace('Inventary')->group(function () {
    Route::resource('category', 'CategoryController');
    Route::resource('types', 'ProductTypeController');
    Route::resource('unit', 'UnitController');
    Route::resource('product', 'ProductController');
  });

  Route::namespace('System')->group(function () {
    //Proveedor
    Route::resource('provider', 'ProviderController');
    Route::get('/provider/{id}/products', 'ProviderController@products')->name('provider.products.create');
    Route::post('/provider/{id}/products', 'ProviderController@productStore')->name('provider.products.store');
    Route::delete('/provider/{id}/products', 'ProviderController@destroyProduct')->name('provider.products.destroy');
    Route::get('company','CompanyController@index')->name('company.index');
    Route::put('company','CompanyController@update')->name('company.update');
    //Index
    Route::get('/provider/{provider_id}/order', 'ProviderController@order')->name('provider.order');
    //Usuarios y Clientes
    Route::resource('user', 'UserController');
    Route::resource('client', 'ClientController');
  });

  Route::namespace('PurchaseOrder')->group(function () {
    //Create y Post
    Route::get('/provider/{provider_id}/order/create', 'PurchaseOrderController@create')->name('order.create');
    Route::post('/provider/{provider_id}/order', 'PurchaseOrderController@store')->name('provider.order.store');
    //Edit y Update
    Route::get('/provider/{provider_id}/order/{order_id}/edit', 'PurchaseOrderController@edit')->name('order.edit');
    Route::put('/provider/{provider_id}/order/{order_id}', 'PurchaseOrderController@update')->name('order.update');
    //Show
    Route::get('/provider/{provider_id}/order/{order_id}','PurchaseOrderController@show')->name('order.show');
    //Destroy
    Route::delete('/provider/{provider_id}/order/{order_id}', 'PurchaseOrderController@destroy')->name('order.destroy');
    //PDF
    Route::get('imprimir-orden-compra/provider/{provider_id}/order/{order_id}', 'PurchaseOrderController@print')->name('provider.order.print');
    Route::get('mostrar-order-compra/provider/{provider_id}/order/{order_id}', 'PurchaseOrderController@preview')->name('provider.order.preview');
    //OrderDetails
    Route::get('provider/{id}/order/{purchase_id}/detail', 'OrderDetailController@create')->name('provider.order.details');
    Route::post('provider/{id}/order/{purchase_id}/detail', 'OrderDetailController@store')->name('provider.order.details.store');
    Route::delete('provider/{id}/order/{purchase_id}/detail', 'OrderDetailController@destroy')->name('provider.order.details.destroy');
    Route::post('/provider/{id}/order/{purchase_id}/recalculated', 'PurchaseOrderController@recalculated')->name('provider.order.recalculated');
  });

  Route::namespace('Cart')->group(function () {
    Route::get('cart','CartController@index')->name('cart.index');
    Route::post('cart','CartController@addProduct')->name('cart.product');
    Route::delete('cart','CartController@deleteProduct')->name('cart.product');
    Route::get('cart/delete','CartController@deleteCart')->name('cart.delete');
  });

  Route::namespace('Budget')->group(function () {
    Route::resource('budget', 'BudgetController');
    Route::get('budget/{id}/service', 'ServiceBudgetController@create')->name('budget.service');
    Route::post('budget/{id}/service', 'ServiceBudgetController@store')->name('budget.service.store');
    Route::delete('budget/{id}/service', 'ServiceBudgetController@service')->name('budget.service.destroy');
    Route::get('budget/{id}/products', 'ProductBudgetController@create')->name('budget.products');
    Route::post('budget/{id}/products', 'ProductBudgetController@store')->name('budget.products.store');
    Route::delete('budget/{id}/products', 'ProductBudgetController@destroy')->name('budget.products.destroy');
    Route::post('budget/{id}/recalculated', 'BudgetController@recalculated')->name('budget.recalculated');
    Route::get('imprimir-pdf/{id}', 'BudgetController@imprimir')->name('imprimir');
    Route::get('mostrar-pdf/{id}', 'BudgetController@preview')->name('preview');
    Route::get('exportar-excel', 'BudgetController@exportExcel')->name('excel');
  });

  //Invoice-Bill
  Route::namespace('Invoice')->group(function () {
    Route::resource('invoice', 'InvoiceBillController');
  });
});
// Route::get('login','Auth\AuthUserController@index')->name('index');
// Route::post('app','Auth\AuthUserController@login')->name('login');
// Route::get('category', 'Inventary\CategoryController@index')->name('category.index');
// Route::get('category/create', 'Inventary\CategoryController@create')->name('category.create');
// Route::post('category', 'Inventary\CategoryController@store')->name('category.store');
// Route::get('cart/products','Cart\CartController@create')->name('cart.product');
// Route::post('cart/products','Cart\CartController@store')->name('cart.store');

// Route::namespace('Inventary')->group(function () {
//   Route::prefix('evento')->group(function () {

//   });
//   Route::get('category', 'CategoryController@index')->name('category.index');
//   Route::get('category/create', 'CategoryController@create')->name('category.create');
//   Route::post('category', 'CategoryController@store')->name('category.store');
// });

// Route::resource('category', 'Inventary\CategoryController',['except'=>['destroy','show','edit','update']]);

