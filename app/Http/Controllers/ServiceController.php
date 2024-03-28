<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\KategoriBlog;
use App\Models\Title;
use App\Models\Config;
use App\Models\KategoriService;
use App\Models\Service;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Path\To\DOMDocument;
// use Intervention\Image\ImageManagerStatic as Image;

class ServiceController extends Controller
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

        $services = Service::latest()->get();
        $page = 'Service';
        return view('admin.service.index', compact('services', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = KategoriService::latest()->get();
        $page = 'Service | Create';
        return view('admin.service.create', compact('categories', 'page'));
    }

    /**
     * Store a newly created resource in File.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
            'overview.required' => 'Overview Layanan Harus di isi',
            'title.required' => 'Judul Layanan Harus di isi',
            'title.unique' => 'Judul Layanan Sudah Terdaftar',
            'desc.required' => 'Deskripsi Layanan Harus di isi',
            'category_id.required' => 'Kategori Layanan Harus di isi',
            'keyword.required' => 'Meta Keyword Layanan Harus di isi',
            'tags.required' => 'Meta Tag Layanan Harus di isi',
            'image.required' => 'Gambar tidak boleh kosong',
            'icon.required' => 'Gambar tidak boleh kosong',
        ];

        $request->validate([
            'overview' => 'required',
            'title' => 'required|unique:blogs',
            'desc' => 'required',
            'category_id' => 'required',
            'keyword' => 'required',
            'tags' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $messages
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

        $data = Service::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'image' => $request->image,
            'icon' => $request->icon,
            'desc' => $request->desc,
            'keyword' => $request->keyword,
            'tags' => $request->tags,
            'view_count' => 0,
            'overview' => $request->overview,
        ]);

        if ($request->hasFile('image')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('image')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('services/', $newFileName);

            $data->image = $newFileName;
            $data->save();
        }
        if ($request->hasFile('icon')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('icon')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('icon')->move('services/icon/', $newFileName);

            $data->icon = $newFileName;
            $data->save();
        }

        return redirect('/admin/service')->with('message', 'Data Anda Berhasil di Tambahkan');
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
        $categories = KategoriService::latest()->get();
        $page = 'Service | Edit';
        $service = Service::find($id);
        return view('admin.service.edit', compact('service', 'categories', 'page'));
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
        $service = Service::find($id);

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

        if($request->hasFile('image')) {

            //hapus old img
            File::delete('services/' . $service->image);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('image')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('services/', $newFileName);
            $service->image = $newFileName;

        }

        if($request->hasFile('icon')) {

            //hapus old img
            File::delete('services/' . $service->icon);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('icon')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('icon')->move('services/icon/', $newFileName);
            $service->icon = $newFileName;

        }

        $service->category_id = $request->category_id;
        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->desc = $request->desc;
        $service->overview = $request->overview;
        $service->keyword = $request->keyword;
        $service->tags = $request->tags;
        $service->save();
        return redirect('/admin/service')->with('message','Data Berhasil Di Update');
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
            $destroy = Service::find($id);
            $destroy->delete();
            return redirect('/admin/service')->with('message', "Data berhasil dihapus");
            ;
        } catch (\Exception $th) {
            return redirect('/admin/service');
        }
    }
}
