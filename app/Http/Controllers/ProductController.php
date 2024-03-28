<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\KategoriProduct;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
// use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(6);
        $product_count = Product::count();
        $page = 'Product';
        return view(
            'admin.product.index',
            compact('product_count', 'products', 'page')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = KategoriProduct::latest()->get();
        $page = 'Product | Create';
        return view('admin.product.create', compact('categories', 'page'));
    }

    /**
     * Store a newly created resource in File.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'overview.required' => 'Overview Product Harus di isi',
            'title.required' => 'Judul Product Harus di isi',
            'title.unique' => 'Judul Product Sudah Terdaftar',
            'desc.required' => 'Deskripsi Product Harus di isi',
            'price.required' => 'Harga Product Harus di isi',
            'category_id.required' => 'Kategori Product Harus di isi',
            'keyword.required' => 'Meta Keyword Product Harus di isi',
            'tags.required' => 'Meta Tag Product Harus di isi',
            'image.required' => 'Gambar tidak boleh kosong',
        ];

        $request->validate(
            [
                'overview' => 'required',
                'title' => 'required|unique:blogs',
                'desc' => 'required',
                'price' => 'required',
                'category_id' => 'required',
                'keyword' => 'required',
                'tags' => 'required',
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            $messages
        );

        //    $content = $request->desc;
        //    $dom = new \DomDocument();
        //    $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        //    $imageFile = $dom->getElementsByTagName('img');

        //    foreach($imageFile as $item => $image){
        //        $data = $image->getAttribute('src');
        //        list($type, $data) = explode(';', $data);
        //        list(, $data)      = explode(',', $data);
        //        $imgeData = base64_decode($data);
        //        $image_name= "/blogs/desc/" . time().$item.'.png';
        //        $path = public_path() . $image_name;
        //        file_put_contents($path, $imgeData);

        //        $image->removeAttribute('src');
        //        $image->setAttribute('src', $image_name);
        //     }
        // $storage = "blogs";
        // $dom = new \DOMDocument();
        // libxml_use_internal_errors(true);
        // $dom->loadHTML($request->desc,LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NOIMPLIED);
        // libxml_clear_errors();
        // $images = $dom->getElementsByTagName('img');
        // foreach($images as $img)
        // {
        //     $src = $img->getAttribute('src');
        //     if(preg_match('/data:image/',$src))
        //     {
        //         preg_match('/data:image\/(?<mime>.*?)\;/',$src,$groups);
        //         $mimetype = $groups['mime'];
        //         $fileNameContent = uniqid();
        //         $fileNameContentRand = substr(md5($fileNameContent),6,6).'_'.time();
        //         $filepath = ("$storage/$fileNameContentRand.$mimetype");
        //         $image = Image::make($src)
        //         ->resize(1200, 1200)
        //         ->encode($mimetype,100)
        //         ->save(public_path($filepath));

        //         $new_src = asset($filepath);
        //         $img->removeAttribute('src');
        //         $img->setAttribute('src',$new_src);
        //         $img->setAttribute('class','img-responsive');
        //     }
        // }

        $data = Product::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'image' => $request->image,
            'desc' => $request->desc,
            'price' => $request->price,
            'keyword' => $request->keyword,
            'tags' => $request->tags,
            'view_count' => 0,
            'overview' => $request->overview,
        ]);

        if ($request->hasFile('image')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('image')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('products/', $newFileName);

            $data->image = $newFileName;
            $data->save();
        }

        return redirect('/admin/product')->with(
            'message',
            'Data Anda Berhasil di Tambahkan'
        );
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
        $categories = KategoriProduct::latest()->get();
        $page = 'Product | Edit';
        $product = Product::find($id);
        return view(
            'admin.product.edit',
            compact('product', 'categories', 'page')
        );
    }

    /**
     * Update the specified resource in File.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        // $content = $request->desc;
        // libxml_use_internal_errors(true);
        // $dom = new \DomDocument();
        // $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | libxml_use_internal_errors(true));
        // $imageFile = $dom->getElementsByTagName('img');

        // foreach ($imageFile as $item => $image) {
        //     $data = $image->getAttribute('src');
        //     if (strpos($data, ';') === false) {
        //         continue;
        //     }
        //     list($type, $data) = explode(';', $data);
        //     list(, $data)      = explode(',', $data);
        //     $imgeData = base64_decode($data);
        //     $image_name = "/blogs/desc/" . time() . $item . '.png';
        //     $path = public_path() . $image_name;
        //     file_put_contents($path, $imgeData);

        //     $image->removeAttribute('src');
        //     $image->setAttribute('src', $image_name);
        // }

        if ($request->hasFile('image')) {
            //hapus old img
            File::delete('products/' . $product->image);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('image')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('products/', $newFileName);
            $product->image = $newFileName;
        }

        $product->category_id = $request->category_id;
        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->desc = $request->desc;
        $product->price = $request->price;
        $product->overview = $request->overview;
        $product->keyword = $request->keyword;
        $product->tags = $request->tags;
        $product->save();
        return redirect('/admin/product')->with(
            'message',
            'Data Berhasil Di Update'
        );
    }

    /**
     * Remove the specified resource from File.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $destroy = Product::find($id);
            $destroy->delete();
            return redirect('/admin/product')->with(
                'message',
                'Data berhasil dihapus'
            );
        } catch (\Exception $th) {
            return redirect('/admin/product');
        }
    }

    public function status($id)
    {
        $products = Product::find($id);

        $status_sekarang = $products->status;

        if ($status_sekarang == 1) {
            Product::where('id', $id)->update([
                'status' => 0,
            ]);
        } else {
            Product::where('id', $id)->update([
                'status' => 1,
            ]);
        }

        return redirect('/admin/product')->with(
            'message',
            'Status Produk berhasil di perbarui!'
        );
    }
}
