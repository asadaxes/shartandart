<?php

use App\Http\Controllers\Admin\SocialloginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\CompareController;
use App\Http\Controllers\Front\LoginController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\WishlistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SslCommerzPaymentController;

use App\Http\Controllers\LinksController;
use App\Http\Controllers\AboutUsController;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/category-product/{id}', [HomeController::class, 'productcategory'])->name('category.product');
Route::get('/sub-category-product/{id}', [HomeController::class, 'subcategoryProduct'])->name('sub.category.product');
Route::get('/subsub-category-product/{id}', [HomeController::class, 'subsubcategoryProduct'])->name('subsub.category.product');
Route::get('/product-detail/{id}', [HomeController::class, 'productdetail'])->name('product.detail');
Route::get('/product-category/{id}', [HomeController::class, 'productcategory'])->name('product.category');
Route::get('/offer', [OfferController::class, 'index'])->name('offer');
Route::get('/offer-details/{id}', [OfferController::class, 'details'])->name('offer.details');

Route::post('/cart-remove', [CartController::class, 'cartremove'])->name('cart.remove');
Route::post('/wishlist-remove', [WishlistController::class, 'wishlistremove'])->name('wishlist.remove');
Route::post('/compare-remove', [CompareController::class, 'compareremove'])->name('compare.remove');
Route::post('/cart-add', [CartController::class, 'cartadd'])->name('cart.add');

//view
Route::post('/sub-category-list', [ProductController::class, 'subcategoryList'])->name('sub.category.list');
Route::post('/sub-sub-category-list', [ProductController::class, 'subsubcategoryList'])->name('subsub.category.list');
Route::post('/product-filter', [ProductController::class, 'productsfilter'])->name('products.filter');
Route::post('/product-sub-filter', [ProductController::class, 'productsubfilter'])->name('product.sub.filter');
Route::post('/product-subsub-filter', [ProductController::class, 'productsubsubfilter'])->name('product.subsub.filter');

Route::post('/search-product', [ProductController::class,'searchproduct'])->name('search');

Route::resource('/cart', CartController::class);
Route::resource('/wishlist', WishlistController::class);
Route::resource('/compare', CompareController::class);



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user/dashboard', [DashboardController::class, 'user'])->name('user.dashboard');
    Route::resource('/order', OrderController::class);
});

Route::get('/', [HomeController::class,'index'])->name('home');

//Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/about-us', [HomeController::class, 'about_us'])->name('about_us');
Route::get('/contact-us', [HomeController::class, 'contact_us'])->name('contact_us');
Route::get('/privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy_policy');
Route::get('/terms-service', [HomeController::class, 'terms_service'])->name('terms_service');
Route::get('/trust-safety', [HomeController::class, 'trust_safety'])->name('trust_safety');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/fees-charges', [HomeController::class, 'fees_charges'])->name('fees_charges');
Route::get('/product/view', [HomeController::class, 'product_view'])->name('product_view');

Route::get('/emi-terms', [LinksController::class,'emi_tearms'])->name('emi_tearms');
Route::get('/shipping-and-delivery', [LinksController::class,'shipping_delivery'])->name('shipping_delivery');
Route::get('/warranty-terms', [LinksController::class,'warranty_terms'])->name('warranty_terms');
Route::get('/refund-returns', [LinksController::class,'refund_returns'])->name('refund_returns');
Route::get('/all-brands', [LinksController::class,'all_brands'])->name('all_brands');

Route::get('/blogs', [LinksController::class,'blogs'])->name('blogs');
Route::get('/blogs/view', [LinksController::class,'blog_view'])->name('blog_view');

Route::get('/about-us', [AboutUsController::class,'about_us'])->name('about_us');
Route::get('/terms-and-contitions', [AboutUsController::class,'terms_conditions'])->name('terms_conditions');
Route::get('/privacy-and-policy', [AboutUsController::class,'privacy_policy'])->name('privacy_policy');
Route::get('/contact-us', [AboutUsController::class,'contact_us'])->name('contact_us');
Route::post('/contact-form-submission', [AboutUsController::class,'contact_form_handler'])->name('contact_form_handler');

Route::get('/login', [LoginController::class,'index'])->name('user.login');
Route::get('/register', [LoginController::class,'register'])->name('user.register');

Route::get('/google/redirect', [SocialloginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google/callback', [SocialloginController::class, 'handleGoogleCallback'])->name('google.callback');


//ssl commrcee
Route::get('/checkout/{id}', [SslCommerzPaymentController::class, 'exampleEasyCheckout'])->name('checkout');
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

Route::get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return 'Cache cleared!';
});
