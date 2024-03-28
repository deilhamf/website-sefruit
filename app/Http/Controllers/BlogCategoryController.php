<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBlog;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = KategoriBlog::latest()->get();
        $page = 'Category';
        return view('admin.category-blog.index', compact('categories', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = 'Category | Create';
        return view('admin.category-blog.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $messages=[
            'title.required' => 'Kategori harus diisi',
        ];

        $request->validate([
            'title' => 'required',
        ], $messages
        );

        $data = KategoriBlog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
        ]);

        return redirect('/admin/category-blog')->with('message', "Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = 'Category | Edit';
        $category = KategoriBlog::find($id);
        return view('admin.category-blog.edit', compact('category', 'page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoryBlog = KategoriBlog::find($id);

        $messages=[
            'title.required' => 'Kategori harus diisi',
        ];

        $request->validate([
            'title' => 'required',
        ], $messages
        );

        $categoryBlog->title = $request->title;
        $categoryBlog->slug = Str::slug($request->title);
        $categoryBlog->save();

        return redirect('/admin/category-blog')->with('message', "Data berhasil diubah");;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $destroy = KategoriBlog::find($id);
            $destroy->delete();
            return redirect('/admin/category-blog')->with('message', "Data berhasil dihapus");
            ;
        } catch (\Exception $th) {
            return redirect('/admin/category-blog');
        }
    }
}
