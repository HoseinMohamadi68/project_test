<?php

//
//use App\Constants\PermissionTitle;
//use App\Http\Controllers\Contacts\CourseController;
//use App\Http\Controllers\Contacts\PhoneController;
//use App\Http\Controllers\Country\CountryController;
//use App\Http\Controllers\File\FileController;
//use App\Http\Controllers\Price\PriceTypeController;
//use App\Http\Controllers\SaleSystem\SaleSystemController;
//use App\Http\Controllers\Currency\CurrencyController;
//use App\Http\Controllers\Payment\PaymentMethodTypeController;
//use App\Http\Controllers\SaleSystem\PartnerController;
//use App\Http\Controllers\User\LoginController;
//use App\Http\Controllers\User\PermissionController;
//use App\Http\Controllers\User\RoleController;
//use App\Http\Controllers\User\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;


Route::apiResource('courses', CourseController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('order_items', OrderItemController::class);
