<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubmailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController; 
use App\Http\Controllers\AdminController; 
use App\Http\Controllers\SubscriptionController;

Route::get('/', function () {
    return redirect()->route('welcome');
});
Route::get('/services', function () {
    return view('services');
})->name('services');
  
Auth::routes();
  

//Users

Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  

//Admin

Route::middleware(['auth', 'user-access:super-admin'])->group(function () {
  
    Route::get('/super-admin/home', [HomeController::class, 'superAdminHome'])->name('products.index');
});
  

// manager

Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});

// Service
Route::get('choose',[ContactController::class,'chooseHelp'])->name('choose');
Route::get('design',[ContactController::class,'designYour'])->name('design');
Route::get('ship',[ContactController::class,'readyShip'])->name('toship');



// Contact US
Route::get('contact', [ContactController::class, 'contact']);
Route::post('contact-us', [ContactController::class, 'store'])->name('contact.us.store');

// Subscribe Mail
Route::get('/', [SubmailController::class, 'submail']);
Route::post('submail', [SubmailController::class, 'substore'])->name('contact.us.substore');

// CRUD
Route::resource('products', ProductController::class);



// New route Admin
Route::get('/usertable', [UserController::class, 'userTable'])->name('usertable');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');


// New route User
Route::get('/Userprofile', [UserProfileController::class, 'show'])->name('Userprofile.show');
Route::post('/Userprofile', [UserProfileController::class, 'update'])->name('Userprofile.update');


Route::get('/allproducts', [ProductController::class, 'allProducts'])->name('products.allProducts');
//  products
Route::get('displays', [ProductController::class, 'showDisplays'])->name('products.displays');
Route::get('ram', [ProductController::class, 'showRAM'])->name('products.ram');
Route::get('ssd', [ProductController::class, 'showSSD'])->name('products.ssd');
Route::get('mouse', [ProductController::class, 'showMouse'])->name('products.mouse');
Route::get('keyboards', [ProductController::class, 'showKeyboards'])->name('products.keyboards');
Route::get('headphones', [ProductController::class, 'showHeadphones'])->name('products.headphones');
Route::get('productss/{id}', [ProductController::class, 'productDetails'])->name('productss.show');
Route::get('products/{id}/download', [ProductController::class, 'download'])->name('products.download');



// cart
// Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add')->middleware('auth');
// Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index')->middleware('auth');
Route::middleware(['web'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add')->middleware('auth');
});
Route::delete('/cart/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
// Submit the checkout form
Route::post('/checkout', [CheckoutController::class, 'submit'])->name('checkout.submit');

Route::post('/checkout/submit', [CheckoutController::class, 'submitOrder'])->name('checkout.submit');
Route::get('/order/success', function () {
    return view('order.success');
})->name('order.success');

Route::get('/orders', [CheckoutController::class, 'showOrders'])->name('order.show');






// Route to display all orders
Route::get('/allOrders', [AdminController::class, 'showOrders'])->name('allOrders');

// Route to update the order status
Route::post('/allOrders/{order}/status', [AdminController::class, 'updateStatus'])->name('allOrder.updateStatus');


Route::post('/contact-us/store', [SubscriptionController::class, 'store'])->name('contact.us.store');

