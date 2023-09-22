<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontBlogController;
use App\Http\Controllers\Front\FrontHomeController;
use App\Http\Controllers\Front\FrontPageController;
use App\Http\Controllers\Front\FrontShopController;
use App\Http\Controllers\Front\FrontContactController;

Route::get('/front/page', [FrontPageController::class, 'index'])->name('front_home');

Route::get('/front/home/page', [FrontHomeController::class, 'index'])->name('front_home_page');

Route::get('/front/shop/page', [FrontShopController::class, 'index'])->name('front_shop_page');

Route::get('/front/contact/page', [FrontContactController::class, 'index'])->name('front_contact_page');

Route::get('/front/Blog/page', [FrontBlogController::class, 'index'])->name('front_blog_page');
