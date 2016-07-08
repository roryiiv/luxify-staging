<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//static front pages
Route::get('/', function(){
    return View::make('index');
});
Route::get('/about', function(){
    return view('about');
});
Route::get('/contact', function(){
    return view('contact');
});
Route::get('/estate', function(){
    return view('estate');
});
Route::get('/terms', function(){
    return view('terms');
});
Route::get('/privacy', function(){
    return view('privacy');
});
Route::get('/dealer-application', function(){
    return view('dealer-application');
});
Route::get('/why-luxify', function(){
    return view('why-luxify');
});

// Ajax endpoints
Route::get('/api/category/{catId}/fields', 'Front@categories_optional_fields');
Route::post('/api/listing/createSlug', 'Slug@createSlug');
Route::get('/api/mailbox', 'Mailbox@index');
Route::post('/api/mailbox', 'Mailbox@conversation');
Route::post('/api/mailbox/send', 'Mailbox@sendMessage');
Route::post('/api/product/setStatus', 'Panel@product_change_status');
Route::get('/api/currency/switch/{code}', 'Front@switchCurrency');
// Test the API URL
// Route::get('/api/product/setStatus', 'Panel@product_change_status');

//Front end Routes
Route::get('/listings','Front@products');
Route::get('/listing/{id}','Front@product_details');
Route::get('/categories','Front@categories');
Route::get('/category/{id}','Front@product_categories');
Route::post('/category/{id}','Front@product_categories');
Route::get('/dealer/{id}','Front@dealer');
Route::get('/dealer/contact/{id}/{item}','Front@dealerContact');
Route::get('/dealer/listings/{id}', 'Front@dealerListing');
Route::post('/contact/dealer/{dealerId}','Front@sendMessage');
Route::get('/register','Front@register');
Route::post('/register','LuxifyAuth@register');
Route::get('/login','Front@login');
Route::post('/login','LuxifyAuth@authenticate');
Route::get('/logout','LuxifyAuth@logout');
Route::get('/search','Front@search');
Route::post('/search','Front@search');
Route::post('/searchAjax','Front@searchAjax');
Route::post('/wishlist/add','Front@wishlistAdd');
Route::post('/dealer-application','Front@dealerApplication');
//Route::get('/build', 'Front@build');

//routes for social oauth login/signup
Route::get('/oauth/redirect/facebook', 'SocialAuthController@fb_redirect');
Route::get('/oauth/callback/facebook', 'SocialAuthController@fb_callback');

// PANEL Routes (admin)
Route::get('/panel','Panel@index');
// Users views related
Route::get('/panel/users','Panel@users');
Route::get('/panel/user/add/{role}','Panel@user_add');
Route::get('/panel/user/edit/{id}','Panel@user_edit');
// Users CRUD methods
Route::post('/panel/add/user/register','Panel@user_register'); //Create
Route::post('/panel/user/update','Panel@user_update'); // Update
Route::get('/panel/user/delete/{id}','Panel@user_delete'); //Delete
Route::post('/panel/upload','Panel@upload');
Route::get('/panel/user/confirm','Panel@user_confirm');
// Products related Views
Route::get('/panel/products','Panel@products');
Route::get('/panel/product/edit/{id}','Panel@products_edit');
Route::post('/panel/product/update/{id}','Panel@productUpdate');
Route::get('/panel/product/delete/{id}', 'Panel@product_delete');
// Products CRUD methods
// Route::post('/panel/products', 'Panel@product_add'); //Create
Route::post('/panel/products/{itemId}', 'Panel@product_edit'); //Update
Route::post('/panel/products/delete/{id}','Panel@products_delete');

//Other Database related operations
Route::get('/panel/categories/rebuild','Panel@cat_rebuild');
Route::get('/panel/listings/rebuild','Panel@listing_rebuild');
Route::get('/panel/extrainfo/rebuild/{id}','Panel@extra_rebuild');
Route::get('/panel/products/confirm','Panel@products_confirm');
Route::get('/panel/currency/exec', 'Panel@currencyExec');


//routes for DASHBOARD (seller)
Route::get('/dashboard', 'Dashboard@index');
Route::get('/dashboard/profile', 'Dashboard@profile');
Route::post('/dashboard/profile', 'Dashboard@profile_update');
Route::get('/dashboard/mailbox', 'Dashboard@mailbox');
Route::get('/dashboard/wishlist', 'Dashboard@wishlist');
Route::get('/dashboard/wishlist/delete/{id}', 'Dashboard@wishlistDelete');

// Dashboard products related views
Route::get('/dashboard/products', 'Dashboard@products');
Route::get('/dashboard/products/add', 'Dashboard@products_add');
Route::get('/dashboard/product/edit/{itemId}', 'Dashboard@products_edit');
// Dashboard CRUD methods
Route::post('/dashboard/products', 'Dashboard@product_add'); //Create
Route::post('/dashboard/products/{itemId}', 'Dashboard@product_edit'); //Update
Route::post('/dashboard/product/delete/{itemId}', 'Dashboard@products_delete'); // Delete
Route::get('/dashboard/product/delete/{id}', 'Dashboard@product_delete'); // Delete Item from list
// Dashboard Images Upload methods
Route::post('/upload', 'Dashboard@single_upload');
Route::post('/upload_multiple', 'Dashboard@multiple_upload');
Route::post('/removeImage', 'Dashboard@remove_image');
//Dashboard support
Route::post('/dashboard/support', 'Dashboard@supportSend');

// Route::auth();
Route::get('/home', 'HomeController@index');
