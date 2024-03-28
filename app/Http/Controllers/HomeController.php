<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Set zona waktu ke WIB
        date_default_timezone_set('Asia/Jakarta');

        // Fungsi untuk mendapatkan waktu sekarang
        $waktu = date('H:i');

        // Fungsi untuk mendapatkan ucapan selamat berdasarkan waktu
        $ucapan = $this->getUcapan($waktu);

        $visitorCount = \App\Models\Visitor::all();
        $admin_count = User::count();
        $service_count = Service::count();
        $blog_count = Blog::count();
        $product_count = Product::count();
        $slider_count = Slider::count();
        $users = DB::table('users')->get();
        return view('home', compact('users', 'blog_count', 'admin_count', 'product_count', 'slider_count', 'service_count', 'visitorCount', 'ucapan', 'waktu'))->with('message', 'Selamat Datang Admin!');
    }

    // Fungsi untuk mendapatkan ucapan berdasarkan waktu
    private function getUcapan($waktu)
    {
        $jam = intval(date('H', strtotime($waktu)));

        if ($jam >= 5 && $jam < 12) {
            return 'Selamat Pagi';
        } elseif ($jam >= 12 && $jam < 17) {
            return 'Selamat Siang';
        } elseif ($jam >= 17 && $jam < 19) {
            return 'Selamat Sore';
        } else {
            return 'Selamat Malam';
        }
    }

    public function adminSearchProduct(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('title', 'like', "%$query%")
        ->orWhere('desc', 'like', "%$query%")
        ->latest()
        ->paginate(8);

        $product_count = Product::count();
        $page = 'Product';
        return view('admin.product.index', compact('page', 'product_count', 'products'));
    }
}
