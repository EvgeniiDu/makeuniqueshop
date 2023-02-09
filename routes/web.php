<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsLetterSubscriberController;
use App\Http\Controllers\SocialController;
use App\Http\Livewire\AboutComponent;
use App\Http\Livewire\AfterWarrantyComponent;
use App\Http\Livewire\ArchitectDesignerComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CatalogComponent;
use App\Http\Livewire\CertifiedGoodComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\DiscountsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\HotSaleComponent;
use App\Http\Livewire\LoyaltyProgramComponent;
use App\Http\Livewire\ManufecturerComponent;
use App\Http\Livewire\NewProductComponent;
use App\Http\Livewire\PayShippingComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\TopSaleComponent;
use App\Http\Livewire\User\MyOrdersComponent;
use App\Http\Livewire\User\ProfileUserComponent;
use App\Http\Livewire\User\UserChangePasswordComponent;
use App\Http\Livewire\User\UserEditProfileComponent;
use App\Http\Livewire\VacanciesComponent;
use App\Http\Livewire\WarrantyReturnsComponent;
use App\Http\Livewire\WishlistComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/email/verify', function () {
    return view('livewire.verify-email');
})->middleware('auth')->name('verification.notice');

require __DIR__.'/auth.php';

Route::get('/auth/google', [SocialController::class, 'googleRedirect'])->name('auth.google');
Route::get('/auth/google/callback', [SocialController::class, 'loginWithGoogle']);

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/profile', ProfileUserComponent::class)->name('user.profile');
    Route::get('/user/edit-profile', UserEditProfileComponent::class)->name('user.editprofile');
    Route::get('/user/change-password', UserChangePasswordComponent::class)->name('user.changepassword');
    Route::get('/user/my-orders', MyOrdersComponent::class)->name('user.myorders');
});

Route::get('/', HomeComponent::class)->name('home');
Route::get('/cart', CartComponent::class)->name('product.cart');
Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist');
Route::get('/checkout', CheckoutComponent::class)->name('checkout');
Route::get('/catalog', CatalogComponent::class)->name('catalog');
Route::get('/catalog/{slug}', ShopComponent::class)->name('shop');
Route::get('/catalog/{slug?}/{prodSlug}', DetailsComponent::class)->name('catalog.details');
Route::get('/product/{prodSlug}', DetailsComponent::class)->name('product.details');
Route::get('/search', SearchComponent::class)->name('product.search');
Route::get('/thank-you', ThankyouComponent::class)->name('thankyou');
Route::get('/discounts', DiscountsComponent::class)->name('discounts');
Route::get('/pay-and-shipping', PayShippingComponent::class)->name('payshipping');
Route::get('/warranty-and-returns', WarrantyReturnsComponent::class)->name('warrantyreturns');
Route::get('/about', AboutComponent::class)->name('about');
Route::get('/contact', ContactComponent::class)->name('contact');
Route::get('/hot-sales', HotSaleComponent::class)->name('hotsales');
Route::get('/top', TopSaleComponent::class)->name('top');
Route::get('/new', NewProductComponent::class)->name('new');
Route::get('/after-warranty', AfterWarrantyComponent::class)->name('afterwarranty');
Route::get('/loyalty-program', LoyaltyProgramComponent::class)->name('loyaltyprogram');
Route::get('/architect-and-designer', ArchitectDesignerComponent::class)->name('architectdesigner');
Route::get('/vacancies', VacanciesComponent::class)->name('vacancies');
Route::get('/manufecturers', ManufecturerComponent::class)->name('manufecturer');
Route::get('/certified-good', CertifiedGoodComponent::class)->name('certifiedgood');
Route::post('/subscribe', [NewsLetterSubscriberController::class, 'subscribe'])->name('subscribe');



Route::middleware('admin')->prefix('admin-panel')->group(function() {
    Route::get('/', \App\Http\Livewire\Admin\HomeComponent::class)->name('admin.home');
    Route::get('products', \App\Http\Livewire\Admin\ProductComponent::class)->name('admin.products');
    Route::get('product/create', \App\Http\Livewire\Admin\CreateProductComponent::class)->name('admin.create.product');
    Route::get('product/edit/{productSlug}', \App\Http\Livewire\Admin\EditProductComponent::class)->name('admin.edit.product');
    Route::get('product/categories', \App\Http\Livewire\Admin\CategoryComponent::class)->name('admin.categories');
    Route::get('product/category/create', \App\Http\Livewire\Admin\CreateCategoryComponent::class)->name('admin.create.categories');
    Route::get('product/category/edit/{categorySlug}', \App\Http\Livewire\Admin\EditCategoryComponent::class)->name('admin.edit.category');
    Route::get('orders', \App\Http\Livewire\Admin\AdminOrdersComponent::class)->name('admin.orders');
    Route::get('order/detail/{order_id}', \App\Http\Livewire\Admin\AdminDetailOrderComponent::class)->name('admin.order.detail');
    Route::get('product/colors', \App\Http\Livewire\Admin\ColorProductComponent::class)->name('admin.colors');
    Route::get('product/color/create', \App\Http\Livewire\Admin\CreateColorProductComponent::class)->name('admin.color.create');

});
