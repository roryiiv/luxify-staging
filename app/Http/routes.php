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

//Front end Routes
Route::get('/','Front@index');
Route::get('/listings','Front@products');
Route::get('/listing/{id}','Front@product_details');
Route::get('/categories','Front@categories');
Route::get('/category/{id}','Front@product_categories');
Route::get('/products/brands/{name}','Front@product_brands');
// Route::get('/blog','Front@blog');
// Route::get('/blog/post/{id}','Front@blog_post');
Route::get('/contact-us','Front@contact_us');
Route::get('/login','Front@login');
Route::post('/login','LuxifyAuth@authenticate');
Route::get('/logout','Front@logout');
Route::get('/search','Front@search');

//Panel (super admin) Routes
Route::get('/panel','Panel@index');
Route::get('/panel/users','Panel@users');
Route::get('/panel/users/add','Panel@user_add');
Route::get('/panel/users/edit','Panel@user_edit');
Route::get('/panel/users/confirm','Panel@user_confirm');
Route::get('/panel/users/delete/{user_id}','Panel@user_delete');
Route::get('/panel/products','Panel@products');
Route::get('/panel/products/add','Panel@products_add');
Route::get('/panel/products/edit','Panel@products_edit');
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
Route::get('/dashboard/wishlist', 'Dashboard@wishlist');

// Route::auth();

Route::get('/home', 'HomeController@index');
