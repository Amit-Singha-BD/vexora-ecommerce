<?php

use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\Backend\AttributeVariantController;
use App\Http\Controllers\Backend\CampaignController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PaymentTrackingController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ReturnRefundController;
use App\Http\Controllers\Backend\SettingController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('/login/view', [AuthenticationController::class, 'loginView'])->name('login.view');
Route::get('/register/view', [AuthenticationController::class, 'registerView'])->name('register.view');


// Admin View Pages Routes
Route::get('/dashboard/view', [DashboardController::class, 'dashboardView'])->name('dashboard.view');

Route::get('/cagegories/view', [CategoriesController::class, 'categoriesView'])->name('categories.view');
Route::get('/cagegories/create/view', [CategoriesController::class, 'categoriesCreateView'])->name('categories.create.view');

Route::get('/product/view', [ProductController::class, 'productView'])->name('product.view');
Route::get('/product/create/view', [ProductController::class, 'productCreateView'])->name('product.create.view');
Route::get('/product/image/view', [ProductController::class, 'productImageView'])->name('product.image.view');

Route::get('/attribute/variant/view', [AttributeVariantController::class, 'attributeVariantView'])->name('attribute.variant.view');
Route::get('/attribute/create/view', [AttributeVariantController::class, 'attributeCreateView'])->name('attribute.create.view');
Route::get('/variant/create/view', [AttributeVariantController::class, 'variantCreateView'])->name('variant.create.view');

Route::get('/Coupon/view', [CouponController::class, 'couponView'])->name('coupon.view');
Route::get('/Coupon/create/view', [CouponController::class, 'couponCreateView'])->name('coupon.create.view');

Route::get('/Campaign/view', [CampaignController::class, 'campaignView'])->name('campaign.view');
Route::get('/Campaign/create/view', [CampaignController::class, 'campaignCreateView'])->name('campaign.create.view');

Route::get('/order/view', [OrderController::class, 'orderView'])->name('order.view');

Route::get('/payment/tracking/view', [PaymentTrackingController::class, 'paymentTrackingView'])->name('payment.tracking.view');

Route::get('/return/refund/view', [ReturnRefundController::class, 'returnRefundView'])->name('return.refund.view');

Route::get('/customer/view', [CustomerController::class, 'customerView'])->name('customer.view');

Route::get('/setting/view', [SettingController::class, 'settingView'])->name('setting.view');
