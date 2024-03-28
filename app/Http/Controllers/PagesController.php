<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Cart;
use App\Models\Config as ModelsConfig;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Footer;
use App\Models\HeadingBenefit;
use App\Models\HeadingTestimonial;
use App\Models\KategoriBlog;
use App\Models\KategoriProduct;
use App\Models\KategoriService;
use App\Models\Keunggulan;
use App\Models\Partner;
use App\Models\Privacy;
use App\Models\Product;
use App\Models\Service;
use App\Models\Visitor;
use App\Models\Slider;
use App\Models\Terms;
use App\Models\Testimonial;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartCount = Cart::count();
        $carts = Cart::with('product')->get();

        $blog = Blog::latest()
            ->take(3)
            ->get();
        $blogs = KategoriBlog::latest()->get();

        $layanan = Service::latest()
            ->take(6)
            ->get();
        // $services = KategoriService::latest()->get();

        $display = Product::where('status', 1)
            ->take(4)
            ->get();
        $displays = KategoriProduct::latest()->get();

        $product_category = Product::latest()->get();
        $product_categories = KategoriProduct::latest()->get();

        $jumlahKategori = Product::select('category_id')
            ->selectRaw('count(*) as jumlah')
            ->groupBy('category_id')
            ->get();

        $popularProducts = Product::orderBy('view_count', 'desc')
            ->take(2)
            ->get();

        $buah = Product::whereHas('category', function ($query) {
            $query->where('title', 'buah');
        })
            ->inRandomOrder()
            ->take(4)
            ->get();

        $sayur = Product::whereHas('category', function ($query) {
            $query->where('title', 'sayur mayur');
        })
            ->inRandomOrder()
            ->take(4)
            ->get();

        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();

        $latests = Product::latest()
            ->take(6)
            ->get();
        $banner = Banner::all();

        $ungguls = Keunggulan::latest()->get();
        $benefits = Keunggulan::latest()
            ->take(4)
            ->get();
        $sliders = Slider::all();
        $abouts = About::all();
        $contacts = Contact::all();
        $visitorCount = Visitor::first()->count;
        $testimonial = Testimonial::latest()->get();
        $config = ModelsConfig::all();
        $headingtesti = HeadingTestimonial::all();
        $footers = Footer::all();
        $brands = Partner::latest()->get();
        return view(
            'welcome',
            compact(
                'cartCount',
                'carts',
                'jumlahKategori',
                'product_category',
                'product_categories',
                'popularProducts',
                'benefits',
                'brands',
                'footers',
                'sayur',
                'buah',
                'banner',
                'latests',
                'headingtesti',
                'service',
                'services',
                'display',
                'layanan',
                'blog',
                'blogs',
                'visitorCount',
                'config',
                'testimonial',
                'displays',
                'sliders',
                'abouts',
                'contacts',
                'ungguls'
            )
        );
    }

    public function cart()
    {
        //
    }

    public function about()
    {
        $cartCount = Cart::count();
        $cartItems = Cart::with('product')->get();

        $footers = Footer::all();

        $blog = Blog::latest()
            ->take(3)
            ->get();
        $blogs = KategoriBlog::latest()
            ->take(3)
            ->get();

        $layanan = Service::inRandomOrder()
            ->take(2)
            ->get();

        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();

        $ungguls = Keunggulan::all();
        $contacts = Contact::all();
        $abouts = About::all();
        $config = ModelsConfig::all();
        $testimonial = Testimonial::all();
        $works = Work::all();
        $headingtesti = HeadingTestimonial::all();
        $brands = Partner::latest()->get();
        $headingbenefit = HeadingBenefit::all();
        return view(
            'pages/about',
            compact(
                'cartCount',
                'cartItems',
                'footers',
                'headingbenefit',
                'brands',
                'headingtesti',
                'works',
                'layanan',
                'service',
                'services',
                'blog',
                'blogs',
                'abouts',
                'config',
                'testimonial',
                'contacts',
                'ungguls'
            )
        );
    }

    public function shop()
    {
        $cartCount = Cart::count();
        $cartItems = Cart::with('product')->get();

        $footers = Footer::all();

        $product = Product::where('status', 1)
            ->latest()
            ->paginate(8);
        $products = KategoriProduct::latest()->get();
        $latests = Product::latest()
            ->take(6)
            ->get();

        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();

        $ungguls = Keunggulan::all();
        $contacts = Contact::all();
        $abouts = About::all();
        $testimonial = Testimonial::all();
        $config = ModelsConfig::all();
        $banner = Banner::all();
        return view(
            'pages/shop',
            compact(
                'cartCount',
                'cartItems',
                'footers',
                'banner',
                'service',
                'services',
                'product',
                'products',
                'config',
                'testimonial',
                'latests',
                'abouts',
                'contacts',
                'ungguls'
            )
        );
    }

    public function blog()
    {
        $cartCount = Cart::count();
        $cartItems = Cart::with('product')->get();

        // Ambil lima blog yang paling sering dilihat
        $mostViewedBlogs = Blog::orderBy('view_count', 'desc')
            ->take(5)
            ->get();

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

        $footers = Footer::all();

        $latest = Blog::latest()
            ->take(8)
            ->get();
        $blog = Blog::latest()->paginate(2);
        $blogs = KategoriBlog::latest()
            ->take(3)
            ->get();
        $blogCategories = KategoriBlog::latest()->get();

        $jumlahKategori = Blog::select('category_id')
            ->selectRaw('count(*) as jumlah')
            ->groupBy('category_id')
            ->get();

        // $popularTags = Blog::selectRaw('tags, COUNT(*) as tag_count')->groupBy('tags')->orderByDesc('tag_count')->take(5)->get();

        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();

        $ungguls = Keunggulan::all();
        $contacts = Contact::all();
        $abouts = About::all();
        $testimonial = Testimonial::all();
        $config = ModelsConfig::all();
        return view(
            'pages/blog',
            compact(
                'cartCount',
                'cartItems',
                'jumlahKategori',
                'topTags',
                'footers',
                'blogCategories',
                'service',
                'services',
                'latest',
                'blog',
                'blogs',
                'config',
                'testimonial',
                'abouts',
                'contacts',
                'ungguls'
            )
        );
    }

    public function contact()
    {
        $cartCount = Cart::count();
        $cartItems = Cart::with('product')->get();

        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();
        $footers = Footer::all();

        $ungguls = Keunggulan::all();
        $contacts = Contact::all();
        $abouts = About::all();
        $testimonial = Testimonial::all();
        $config = ModelsConfig::all();
        return view(
            'pages/contact',
            compact(
                'cartCount',
                'cartItems',
                'footers',
                'service',
                'services',
                'abouts',
                'config',
                'testimonial',
                'contacts',
                'ungguls'
            )
        );
    }

    public function searchBlog(Request $request)
    {
        $cartCount = Cart::count();
        $cartItems = Cart::with('product')->get();

        $latest = Blog::latest()
            ->take(8)
            ->get();
        $blog = Blog::latest()->paginate(2);
        $blogs = KategoriBlog::latest()
            ->take(3)
            ->get();

        // Ambil lima blog yang paling sering dilihat
        $mostViewedBlogs = Blog::orderBy('view_count', 'desc')
            ->take(5)
            ->get();

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

        $blogCategories = KategoriBlog::latest()->get();

        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();

        $jumlahKategori = Blog::select('category_id')
            ->selectRaw('count(*) as jumlah')
            ->groupBy('category_id')
            ->get();

        $ungguls = Keunggulan::all();
        $contacts = Contact::all();
        $abouts = About::all();
        $testimonial = Testimonial::all();
        $config = ModelsConfig::all();

        $query = $request->input('query');
        $blog = Blog::where('title', 'like', "%$query%")
            ->orWhere('desc', 'like', "%$query%")
            ->latest()
            ->paginate(2);
        $footers = Footer::all();

        return view(
            'pages/blog',
            compact(
                'cartCount',
                'cartItems',
                'jumlahKategori',
                'topTags',
                'footers',
                'blogCategories',
                'blog',
                'service',
                'services',
                'latest',
                'blog',
                'blogs',
                'config',
                'testimonial',
                'abouts',
                'contacts',
                'ungguls'
            )
        );
    }

    public function searchProduct(Request $request)
    {
        $cartCount = Cart::count();
        $cartItems = Cart::with('product')->get();

        $product = Product::inRandomOrder()->paginate(9);
        $products = KategoriProduct::latest()->get();
        $latests = Product::latest()
            ->take(6)
            ->get();

        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();

        $jumlahKategori = Product::select('category_id')
            ->selectRaw('count(*) as jumlah')
            ->groupBy('category_id')
            ->get();

        $ungguls = Keunggulan::all();
        $contacts = Contact::all();
        $abouts = About::all();
        $testimonial = Testimonial::all();
        $config = ModelsConfig::all();
        $banner = Banner::all();

        $query = $request->input('query');
        $product = Product::where('title', 'like', "%$query%")
            ->orWhere('desc', 'like', "%$query%")
            ->latest()
            ->paginate(8);
        $footers = Footer::all();

        return view(
            'pages/shop',
            compact(
                'cartCount',
                'cartItems',
                'jumlahKategori',
                'footers',
                'banner',
                'service',
                'services',
                'product',
                'products',
                'config',
                'testimonial',
                'latests',
                'abouts',
                'contacts',
                'ungguls'
            )
        );
    }

    public function faqs()
    {
        $cartCount = Cart::count();
        $cartItems = Cart::with('product')->get();

        $blog = Blog::latest()
            ->take(3)
            ->get();
        $blogs = KategoriBlog::latest()->get();

        $faqs = Faq::latest()->get();
        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();

        $contacts = Contact::all();
        $abouts = About::all();
        $config = ModelsConfig::all();
        $testimonial = Testimonial::all();
        $brands = Partner::latest()->get();
        $headingtesti = HeadingTestimonial::all();
        $footers = Footer::all();
        return view(
            'pages/faqs',
            compact(
                'cartCount',
                'cartItems',
                'footers',
                'blog',
                'blogs',
                'headingtesti',
                'faqs',
                'brands',
                'service',
                'services',
                'abouts',
                'config',
                'testimonial',
                'contacts'
            )
        );
    }

    public function terms()
    {
        $cartCount = Cart::count();
        $cartItems = Cart::with('product')->get();

        $blog = Blog::latest()
            ->take(3)
            ->get();
        $blogs = KategoriBlog::latest()->get();

        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();

        $terms = Terms::all();

        $contacts = Contact::all();
        $abouts = About::all();
        $config = ModelsConfig::all();
        $testimonial = Testimonial::all();
        $brands = Partner::latest()->get();
        $headingtesti = HeadingTestimonial::all();
        $footers = Footer::all();

        return view(
            'pages/terms',
            compact(
                'cartCount',
                'cartItems',
                'footers',
                'terms',
                'blog',
                'blogs',
                'headingtesti',
                'brands',
                'service',
                'services',
                'abouts',
                'config',
                'testimonial',
                'contacts'
            )
        );
    }

    public function privacy()
    {
        $cartCount = Cart::count();
        $cartItems = Cart::with('product')->get();

        $blog = Blog::latest()
            ->take(3)
            ->get();
        $blogs = KategoriBlog::latest()->get();

        $service = Service::latest()->get();
        $services = KategoriService::latest()->get();

        $privacy = Privacy::all();

        $contacts = Contact::all();
        $abouts = About::all();
        $config = ModelsConfig::all();
        $testimonial = Testimonial::all();
        $brands = Partner::latest()->get();
        $footers = Footer::all();
        $headingtesti = HeadingTestimonial::all();
        return view(
            'pages/privacy',
            compact(
                'cartCount',
                'cartItems',
                'footers',
                'privacy',
                'blog',
                'blogs',
                'headingtesti',
                'brands',
                'service',
                'services',
                'abouts',
                'config',
                'testimonial',
                'contacts'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
