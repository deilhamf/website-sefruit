<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Config;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Footer;
use App\Models\KategoriBlog;
use App\Models\KategoriProduct;
use App\Models\KategoriService;
use App\Models\Keunggulan;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{

    public function product_detail($slug)
    {
        $cartCount = Cart::count();
        $cartItems = Cart::with('product')->get();

        $products = Product::latest()->get();
        $product_details = Product::where('slug', $slug)->first();
        $product_details->increment('view_count');
        $tagsArray = explode(',', $product_details->tags);
        $category_product = KategoriProduct::all();

        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();

        $abouts = About::all();
        $partners = Partner::all();
        $layanan = Service::latest()->get();
        $contacts = Contact::all();
        $others = Product::inRandomOrder()->take(9)->get();
        $testimonials = Testimonial::inRandomOrder()->take(5)->get();
        $config = Config::all();

        $footers = Footer::all();

        return view('detail.product', compact('cartCount', 'cartItems', 'footers', 'service', 'services', 'category_product', 'config', 'tagsArray', 'product_details', 'testimonials', 'others', 'products', 'abouts', 'contacts'));
    }

    public function blog_detail($slug)
    {
        $cartCount = Cart::count();
        $cartItems = Cart::with('product')->get();

        $popularBlogs = Blog::orderBy('view_count', 'asc')->take(5)->get();

        // Ambil lima blog yang paling sering dilihat
        $mostViewedBlogs = Blog::orderBy('view_count', 'desc')->take(5)->get();

        // Inisialisasi array untuk menyimpan tags
        $tags = [];

        // Loop melalui setiap blog dan tambahkan tags ke array
        foreach ($mostViewedBlogs as $blog) {
            $tags = array_merge($tags, explode(',', $blog->tags));
        }

        // Hitung jumlah setiap tag
        $tagCounts = array_count_values($tags);

        // Urutkan tags berdasarkan jumlahnya
        arsort($tagCounts);

        // Ambil lima tags teratas
        $topTags = array_slice($tagCounts, 0, 5, true);

        $jumlahKategori = Blog::select('category_id')->selectRaw('count(*) as jumlah')->groupBy('category_id')->get();

        $blog_details = Blog::where('slug', $slug)->first();
        $blog_details->increment('view_count');
        $category_blog = KategoriBlog::all();
        $blog_count = KategoriBlog::count();
        $blogCategories = KategoriBlog::latest()->get();

        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();

        $latest = Blog::latest()->take(3)->get();
        $contacts = Contact::all();
        $abouts = About::all();
        $tagsArray = explode(',', $blog_details->tags);
        $config = Config::all();
        $footers = Footer::all();
        return view('detail.blog', compact('cartCount', 'cartItems', 'jumlahKategori', 'popularBlogs', 'topTags', 'footers', 'blogCategories', 'service', 'services', 'latest', 'abouts', 'blog_details', 'category_blog', 'blog_count', 'config', 'tagsArray', 'contacts'));
    }

    public function service_detail($slug)
    {
        $cartCount = Cart::count();
        $cartItems = Cart::with('product')->get();

        $service_details = Service::where('slug', $slug)->first();
        $category_service = KategoriService::latest()->get();
        $service_count = KategoriService::count();
        
        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();

        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();

        $otherServices = Service::latest()->get();

        $latest = Service::latest()->take(3)->get();
        $contacts = Contact::all();
        $abouts = About::all();
        $tagsArray = explode(',', $service_details->tags);
        $config = Config::all();
        $footers = Footer::all();
        $banner = Banner::all();
        $faqs = Faq::latest()->get();
        return view('detail.service', compact('cartCount', 'cartItems', 'banner', 'otherServices', 'faqs', 'footers', 'service', 'services', 'latest', 'abouts', 'service_details', 'category_service', 'service_count', 'config', 'tagsArray', 'contacts'));
    }
}
