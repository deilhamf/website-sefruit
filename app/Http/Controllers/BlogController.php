<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\KategoriBlog;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
// use Intervention\Image\ImageManagerStatic as Image;

class BlogController extends Controller
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

        $blogs = Blog::latest()->get();
        $page = 'Blog';
        return view('admin.blog.index', compact('blogs', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = KategoriBlog::latest()->get();
        $page = 'Blog | Create';
        return view('admin.blog.create', compact('categories', 'page'));
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
            'overview.required' => 'Overview Blog Harus di isi',
            'title.required' => 'Judul Blog Harus di isi',
            'title.unique' => 'Judul Blog Sudah Terdaftar',
            'desc.required' => 'Deskripsi Blog Harus di isi',
            'category_id.required' => 'Kategori Blog Harus di isi',
            'keyword.required' => 'Meta Keyword Blog Harus di isi',
            'tags.required' => 'Meta Tag Blog Harus di isi',
            'image.required' => 'Gambar tidak boleh kosong',
        ];

        $request->validate([
            'overview' => 'required',
            'title' => 'required|unique:blogs',
            'desc' => 'required',
            'category_id' => 'required',
            'keyword' => 'required',
            'tags' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        $data = Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category_id,
            'image' => $request->image,
            'desc' => $request->desc,
            'keyword' => $request->keyword,
            'user_id' => $request->user_id,
            'tags' => $request->tags,
            'view_count' => 0,
            'overview' => $request->overview,
        ]);

        if ($request->hasFile('image')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('image')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('blogs/', $newFileName);

            $data->image = $newFileName;
            $data->save();
        }

        return redirect('/admin/blog')->with('message', 'Data Anda Berhasil di Tambahkan');
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
        $categories = KategoriBlog::latest()->get();
        $page = 'Blog | Edit';
        $blog = Blog::find($id);
        return view('admin.blog.edit', compact('blog', 'categories', 'page'));
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
        $blog = Blog::find($id);

        if($request->hasFile('image')) {

            //hapus old img
            File::delete('blogs/' . $blog->image);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('image')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('blogs/', $newFileName);
            $blog->image = $newFileName;

        }

        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->desc = $request->desc;
        $blog->overview = $request->overview;
        $blog->keyword = $request->keyword;
        $blog->tags = $request->tags;
        $blog->save();
        return redirect('/admin/blog')->with('message','Data Berhasil Di Update');
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
            $destroy = Blog::find($id);
            $destroy->delete();
            return redirect('/admin/blog')->with('message', "Data berhasil dihapus");
            ;
        } catch (\Exception $th) {
            return redirect('/admin/blog');
        }
    }
}
