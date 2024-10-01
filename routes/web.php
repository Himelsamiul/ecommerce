<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\HeroBannerController;
use App\Http\Controllers\CompanyLogoController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\SocialShareButtonsController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\frontend\ProductController as FrontendProductController;





Route::get('/',[FrontendHomeController::class,'home'])->name('home');
Route::get('/contact',[ContactController::class,'contact']);
Route::post('/contact-form',[ContactController::class,'contactForm'])->name('contact.form.store');
Route::get('/login-frontend', [LoginController::class, 'showLoginFormFrontend'])->name('login.frontend');
Route::get('/product',[FrontendProductController::class,'product']);
Route::get('/product-details/{id}',[FrontendProductController::class,'productDetails'])->name('details');
Route::get('/search',[SearchController::class,'search'])->name('user.search');
Route::get('/profile',[ProfileController::class,'profile']);
Route::get('/admin-profile',[ProfileController::class,'adminProfile']);
Route::post('/pay/{id}', [SslCommerzPaymentController::class, 'index'])->name('pay.now');
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
Route::controller(LoginController::class)->group(function(){
Route::get('/login','showLoginForm')->name('login');
Route::post('/login','loginProcess')->name('login.submit');
Route::get('/logout','logout')->name('logout');
Route::get('/registration', 'registration')->name('registration');
Route::post('/registration', 'registrationStore')->name('registration.submit');});

Route::group(['middleware' => 'customerAuth'], function () {
    Route::controller(AddToCartController::class)->group(function(){
        Route::get('add-to-cart/{id}','addToCart')->name('add.to.cart');
        Route::get('/view-cart','viewCart');
        Route::get('/clear-cart','clearCart')->name('cart.clear');
        
        Route::get('/cart-item/delete/{id}','cartItemDelete')->name('cart.item.delete');});

        // POST route for updating cart item quantity
Route::post('/cart-item/update-quantity/{id}', [AddToCartController::class, 'updateCartQuantity'])->name('cart.update.quantity');
Route::controller(WishlistController::class)->group(function(){
Route::get('/wishlist',  'index')->name('wishlist.index');
Route::post('/wishlist/add/{id}', 'addToWishlist')->name('add.to.wishlist');
Route::get('/wishlist/remove/{wishlist}','removeFromWishlist')->name('remove.Wishlist');
Route::post('/cart/add-from-wishlist/{id}','addToCartFromWishlist')->name('cart.add-from-wishlist');});
Route::get('/product-checkout/{id}',[FrontendProductController::class,'productCheckout'])->name('product.checkout');
Route::post('/product/rate/{id}',[ProductController::class,'storeRating'])->name('product.rate');

});

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
Route::get('/',[HomeController::class,'dashboard'])->name('dashboard');
Route::controller(CategoryController::class)->group(function(){
Route::get('/category-form','categoryForm')->name('category.form');
Route::get('/website-title-form','websiteTitle')->name('website.form');
Route::post('/category-store','categoryStore')->name('category.store');
Route::get('/category-list','categoryList')->name('category.list');
Route::get('/category-edit/{id}','categoryedit')->name('category.edit');
Route::post('/category-update/{id}','categorupdate')->name('category.update');
Route::get('/category-delete/{id}','categordelete')->name('category.delete');});
Route::controller(ProductController::class)->group(function(){
Route::get('/product-form','productForm')->name('product.form');
Route::post('/product-store','productStore')->name('product.store');
Route::get('/product-list','productList')->name('product.list');
Route::get('/product-edit/{id}','productEdit')->name('product.edit');
Route::post('/product-update/{id}','productupdate')->name('product.update');
Route::get('/product-delete/{id}','productDelete')->name('product.delete');
});

Route::get('/order-confirm/{id}', [OrderController::class, 'confirm'])->name('confirm');
Route::get('/order-cancel/{id}', [OrderController::class, 'cancel'])->name('order.cancel');

Route::controller(OrderController::class)->group(function(){
Route::get('/order-list','orderList')->name('order.list');});  
Route::get('/contact-list',[ContactController::class,'contactlist'])->name('contact.list');
Route::get('/contact-view/{id}',[ContactController::class,'contactview'])->name('contact.view');
Route::controller(ReportController::class)->group(function(){
Route::get('/report','report')->name('report');
Route::get('/report/search','reportSearch')->name('order.report.search');});

});
