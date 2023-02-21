<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\LoginComponent;
use App\Http\Livewire\Site\WelcomeComponent;
use App\Http\Livewire\Auth\RegisterComponent;
use App\Http\Livewire\Site\Cart\CartComponent;
use App\Http\Livewire\Site\Shop\ShopComponent;
use App\Http\Livewire\Auth\ResetPasswordComponent;
use App\Http\Livewire\Site\Products\WishComponent;
use App\Http\Livewire\Auth\ForgotPasswordComponent;
use App\Http\Livewire\Dashboard\DashboardComponent;
use App\Http\Livewire\Dashboard\Sale\SaleComponent;
use App\Http\Livewire\Dashboard\User\UserComponent;
use App\Http\Livewire\Auth\ConfirmPasswordComponent;
use App\Http\Livewire\Site\Account\AccountComponent;
use App\Http\Livewire\Site\Contact\ContactComponent;
use App\Http\Livewire\Site\Products\DetailComponent;
use App\Http\Livewire\Site\Products\SearchComponent;
use App\Http\Livewire\Site\Checkout\CheckoutComponent;
use App\Http\Livewire\Dashboard\Orderss\OrderComponent;
use App\Http\Livewire\Site\Orders\OrderDetailComponent;
use App\Http\Livewire\Site\Products\CategorieComponent;
use App\Http\Livewire\Dashboard\Coupons\CouponComponent;
use App\Http\Livewire\Dashboard\Product\ProductComponent;
use App\Http\Livewire\Dashboard\Carousel\CarouselComponent;
use App\Http\Livewire\Dashboard\Category\CategoryComponent;
use App\Http\Livewire\Dashboard\Attributs\AttributComponent;
use App\Http\Livewire\Dashboard\Parametre\ParametreComponent;
use App\Http\Livewire\Dashboard\Product\ProductEditComponent;
use App\Http\Livewire\Dashboard\Contact\AdminContactComponent;
use App\Http\Livewire\Dashboard\Product\ProductImageComponent;
use App\Http\Livewire\Dashboard\Orderss\OrderssDetailComponent;
use App\Http\Livewire\Dashboard\Product\ProductCreateComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', WelcomeComponent::class)->name('welcome');

Route::get('/dashboard', DashboardComponent::class)->name('dashboard');

Route::get('/login', LoginComponent::class)->name('login');
Route::get('/register', RegisterComponent::class)->name('register');
Route::get('/user/confirmed-password-status', ConfirmPasswordComponent::class)->name('password.confirmation');
Route::get('/forgot-password', ForgotPasswordComponent::class)->name('password.request');
Route::get('/reset-password/{token}', ResetPasswordComponent::class)->name('password.reset');

Route::get('/contact', ContactComponent::class)->name('site.contact');
Route::prefix('site')->group(function () {
    Route::get('/detail-produit/{id}', DetailComponent::class)->name('site.detail-produit');
    Route::get('/produit-categorie/{id}/{id_scategory?}/{id_sscategory?}', CategorieComponent::class)->name('site.produit-categorie');
    Route::get('/boutique', ShopComponent::class)->name('site.shop');
    Route::get('/search', SearchComponent::class)->name('site.search');

    Route::get('/shopping-cart', CartComponent::class)->name('site.shopping-cart');
    Route::get('/shopping-wishlist', WishComponent::class)->name('site.shopping-wishlist');

    Route::get('/detail-commande/{order_id}', OrderDetailComponent::class)->name('site.detail-order');
    Route::get('/mon-compte', AccountComponent::class)->name('site.my-account');


    Route::get('/checkout', CheckoutComponent::class)->name('checkout');

});

     //Language Change
     Route::get('lang/{locale}', function($locale){
        if( !in_array($locale, ['en', 'es', 'pt', 'fr']) ) {
          abort(400);
        }
        Session()->put('locale', $locale);
        Session()->get('locale');
        App::setLocale($locale);
        return redirect()->back();
      })->name('lang');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),  'verified'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/liste-produits', ProductComponent::class)->name('admin.product-index');
            Route::get('/product-create', ProductCreateComponent::class)->name('admin.product-create');
            Route::get('/product-edit/{id}', ProductEditComponent::class)->name('admin.product-edit');
            Route::get('/detail-produit/{id}', ProductImageComponent::class)->name('admin.detail-produit');

            Route::get('/liste-categories', CategoryComponent::class)->name('admin.category-index');

            Route::get('/liste-coupons', CouponComponent::class)->name('admin.coupon-index');

            Route::get('/liste-carousels', CarouselComponent::class)->name('admin.carousel-index');

            Route::get('/liste-commandes', OrderComponent::class)->name('admin.order-index');
            Route::get('/detail-commande/{order_id}', OrderssDetailComponent::class)->name('admin.detail-order');

            Route::get('/liste-Sale', SaleComponent::class)->name('admin.sale-index');

            Route::get('/liste-attributes', AttributComponent::class)->name('admin.attributes-index');


        });

        Route::prefix('administration')->group(function () {
            Route::get('/liste-utilisateurs', UserComponent::class)->name('admin.user-index');
            Route::get('/admin-contact', AdminContactComponent::class)->name('admin.contact-index');
            Route::get('/admin-parametrage', ParametreComponent::class)->name('admin.parametre-index');

        });
});




