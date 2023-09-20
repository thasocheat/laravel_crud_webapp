<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontPageController;

Route::get('/front/page', [FrontPageController::class, 'index'])->name('front_home');
