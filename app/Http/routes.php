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
// Ajax endpoints
Route::get('/api/category/{catId}/fields', 'Front@categories_optional_fields');
Route::post('/api/listing/createSlug', 'Slug@createSlug');
Route::get('/api/mailbox', 'Mailbox@index');
Route::post('/api/mailbox', 'Mailbox@conversation');
Route::post('/api/mailbox/send', 'Mailbox@sendMessage');

//Front end Routes

Route::get('/listings','Front@products');
Route::get('/listing/{id}','Front@product_details');
Route::get('/categories','Front@categories');
Route::get('/category/{id}','Front@product_categories');
Route::post('/category/{id}','Front@product_categories');
Route::get('/dealer/{id}','Front@dealer');
Route::get('/dealer/contact/{id}/{item}','Front@dealerContact');
Route::post('/contact/dealer','Front@sendMessage');
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

//Panel (super admin) Routes
Route::get('/panel','Panel@index');
Route::get('/panel/users','Panel@users');
Route::get('/panel/user/add/{role}','Panel@user_add');
Route::get('/panel/user/edit/{id}','Panel@user_edit');
Route::post('/panel/add/user/register','Panel@user_register');
Route::post('/panel/user/update','Panel@user_update');
Route::post('/panel/upload','Panel@upload');
Route::get('/panel/user/confirm','Panel@user_confirm');
Route::get('/panel/user/delete/{id}','Panel@user_delete');
Route::get('/panel/products','Panel@products');
Route::get('/panel/products/add','Panel@products_add');
Route::get('/panel/products/edit/{id}','Panel@products_edit');
Route::get('/panel/products/delete/{id}','Panel@products_delete');
Route::get('/panel/products/confirm','Panel@products_confirm');
Route::get('/panel/categories/rebuild','Panel@cat_rebuild');
Route::get('/panel/listings/rebuild','Panel@listing_rebuild');

//routes for social oauth login/signup
Route::get('/oauth/redirect/facebook', 'SocialAuthController@fb_redirect');
Route::get('/oauth/callback/facebook', 'SocialAuthController@fb_callback');

//routes for dashboard
Route::get('/dashboard', 'Dashboard@index');
Route::get('/dashboard/profile', 'Dashboard@profile');
Route::post('/dashboard/profile', 'Dashboard@profile_update');
Route::get('/dashboard/mailbox', 'Dashboard@mailbox');
Route::post('/dashboard/mailbox', 'Dashboard@mailbox_ajax');
Route::get('/dashboard/wishlist', 'Dashboard@wishlist');
Route::get('/dashboard/wishlist/delete/{id}', 'Dashboard@wishlistDelete');
Route::get('/dashboard/products', 'Dashboard@products');
Route::get('/dashboard/products/add', 'Dashboard@products_add');
Route::get('/dashboard/product/edit/{itemId}', 'Dashboard@products_edit');
Route::get('/dashboard/mailbox', 'Dashboard@mailbox');
Route::post('/dashboard/products/{itemId}', 'Dashboard@product_edit');
Route::post('/dashboard/products', 'Dashboard@product_add');
Route::post('/upload', 'Dashboard@single_upload');
Route::post('/upload_multiple', 'Dashboard@multiple_upload');
Route::post('/removeImage', 'Dashboard@remove_image');

// Route::auth();

Route::get('/home', 'HomeController@index');
