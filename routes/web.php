<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\FaqsController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HeadingBenefitController;
use App\Http\Controllers\HeadingTestiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeunggulanController;
use App\Http\Controllers\KirimEmailController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\WorkController;
use App\Models\About;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Visitor;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [SearchController::class, 'index']);
// Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.addToCart');
// Route::get('/search', [SearchController::class, 'index']);
// Route::post('/search', [SearchController::class, 'search']);

// Pages
Route::get('/', [PagesController::class, 'index'])->name('home');

// Visitor
// Route::get('/', function () {
//     $products = Product::inRandomOrder()->take(9)->get();
//     $sliders = Slider::all();
//     $abouts = About::all();
//     $partners = Partner::all();
//     $services = Service::all();
//     $contacts = Contact::all();
//     $visitorCount = Visitor::first()->count;

//     return view('welcome', compact('visitorCount', 'products', 'sliders', 'abouts', 'partners', 'contacts', 'services'));
// })->middleware('visitor');

Route::get('/pages/about', [PagesController::class, 'about'])->name('about');
Route::get('/pages/shop', [PagesController::class, 'shop'])->name('shop');
Route::get('/pages/blog', [PagesController::class, 'blog'])->name('blog');
Route::get('/pages/faqs', [PagesController::class, 'faqs'])->name('faqs');
Route::get('/pages/terms', [PagesController::class, 'terms'])->name('terms');
Route::get('/pages/privacy', [PagesController::class, 'privacy'])->name(
    'privacy'
);

Route::get('/pages/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/pages/cart/add/{product}', [
    CartController::class,
    'addToCart',
])->name('cart.add');
Route::put('/pages/cart/{id}/update', [CartController::class, 'update'])->name(
    'cart.update'
);
Route::delete('/pages/cart/remove/{cartItem}', [
    CartController::class,
    'removeFromCart',
])->name('cart.remove');
Route::get('/pages/cart/total', [CartController::class, 'getTotalPrice'])->name(
    'cart.total'
);
Route::post(
    '/generate-whatsapp-urls',
    'WhatsAppController@generateWhatsAppURLs'
)->name('generate.whatsapp.urls');

Route::get('/searchBlog', [PagesController::class, 'searchBlog'])->name(
    'search.blog'
);
Route::get('/searchProduct', [PagesController::class, 'searchProduct'])->name(
    'search.product'
);
Route::get('/pages/contact', [PagesController::class, 'contact'])->name(
    'contact'
);

Route::prefix('pages')->group(function () {
    Route::get('/detail/{slug}/service', [
        DetailController::class,
        'service_detail',
    ])->name('detail.service');
    Route::get('/detail/{slug}/product', [
        DetailController::class,
        'product_detail',
    ])->name('detail.product');
    Route::get('/detail/{slug}/blog', [
        DetailController::class,
        'blog_detail',
    ])->name('detail.blog');
});

Route::get('formemail', [KirimEmailController::class, 'index']);
Route::post('kirim', [KirimEmailController::class, 'kirim']);

Auth::routes();

Route::middleware(['auth', 'user-access:1'])->group(function () {
    Route::get('/admin', [
        App\Http\Controllers\HomeController::class,
        'index',
    ])->name('admin');
    Route::get('/adminSearchProduct', [
        HomeController::class,
        'adminSearchProduct',
    ])->name('admin.search.product');

    // CRUD
    Route::resource('admin/product', ProductController::class);
    Route::get('/delete-product/{id}', [
        App\Http\Controllers\ProductController::class,
        'destroy',
    ]);
    Route::get('admin/product/status/{id}', [
        App\Http\Controllers\ProductController::class,
        'status',
    ]);

    Route::resource('admin/category-product', ProductCategoryController::class);
    Route::get('/delete-category-product/{id}', [
        App\Http\Controllers\ProductCategoryController::class,
        'destroy',
    ]);

    Route::resource('admin/slider', SliderController::class);
    Route::get('/delete-slider/{id}', [
        App\Http\Controllers\SliderController::class,
        'destroy',
    ]);

    Route::resource('admin/about', AboutController::class);
    Route::get('/delete-about/{id}', [
        App\Http\Controllers\AboutController::class,
        'destroy',
    ]);

    Route::resource('admin/partner', PartnerController::class);
    Route::get('/delete-partner/{id}', [
        App\Http\Controllers\PartnerController::class,
        'destroy',
    ]);

    Route::resource('admin/service', ServiceController::class);
    Route::get('/delete-service/{id}', [
        App\Http\Controllers\ServiceController::class,
        'destroy',
    ]);

    Route::resource('admin/category-service', ServiceCategoryController::class);
    Route::get('/delete-category-service/{id}', [
        App\Http\Controllers\ServiceCategoryController::class,
        'destroy',
    ]);

    Route::resource('admin/contact', ContactController::class);
    Route::get('/delete-contact/{id}', [
        App\Http\Controllers\ContactController::class,
        'destroy',
    ]);

    Route::resource('admin/banner', BannerController::class);
    Route::get('/delete-banner/{id}', [
        App\Http\Controllers\BannerController::class,
        'destroy',
    ]);

    Route::resource('admin/keunggulan', KeunggulanController::class);
    Route::get('/delete-keunggulan/{id}', [
        App\Http\Controllers\KeunggulanController::class,
        'destroy',
    ]);

    Route::resource('admin/testi', TestimoniController::class);
    Route::get('/delete-testi/{id}', [
        App\Http\Controllers\TestimoniController::class,
        'destroy',
    ]);

    Route::resource('admin/config', ConfigController::class);
    Route::get('/delete-config/{id}', [
        App\Http\Controllers\ConfigController::class,
        'destroy',
    ]);

    Route::resource('admin/footer', FooterController::class);
    Route::get('/delete-footer/{id}', [
        App\Http\Controllers\FooterController::class,
        'destroy',
    ]);

    Route::resource('admin/blog', BlogController::class);
    Route::get('/delete-blog/{id}', [
        App\Http\Controllers\BlogController::class,
        'destroy',
    ]);

    Route::resource('admin/category-blog', BlogCategoryController::class);
    Route::get('/delete-category-blog/{id}', [
        App\Http\Controllers\BlogCategoryController::class,
        'destroy',
    ]);

    Route::resource('admin/work', WorkController::class);
    Route::get('/delete-work/{id}', [
        App\Http\Controllers\WorkController::class,
        'destroy',
    ]);

    Route::resource('admin/heading-testi', HeadingTestiController::class);
    Route::get('/delete-heading-testi/{id}', [
        App\Http\Controllers\HeadingTestiController::class,
        'destroy',
    ]);

    Route::resource('admin/heading-benefit', HeadingBenefitController::class);
    Route::get('/delete-benefit-testi/{id}', [
        App\Http\Controllers\HeadingBenefitController::class,
        'destroy',
    ]);

    Route::resource('admin/faqs', FaqsController::class);
    Route::get('/delete-faqs/{id}', [
        App\Http\Controllers\FaqsController::class,
        'destroy',
    ]);

    Route::resource('admin/terms', TermsController::class);
    Route::get('/delete-terms/{id}', [
        App\Http\Controllers\TermsController::class,
        'destroy',
    ]);

    Route::resource('admin/privacy', PrivacyController::class);
    Route::get('/delete-privacy/{id}', [
        App\Http\Controllers\PrivacyController::class,
        'destroy',
    ]);
});
