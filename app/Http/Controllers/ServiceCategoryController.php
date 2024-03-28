<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBlog;
use App\Models\KategoriService;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
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
        $categories = KategoriService::latest()->get();
        $page = 'Category';
        return view('admin.category-service.index', compact('categories', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = 'Category | Create';
        return view('admin.category-service.create', compact('page'));
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

        $data = KategoriService::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
        ]);

        return redirect('/admin/category-service')->with('message', "Data berhasil ditambahkan");
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
        $category = KategoriService::find($id);
        return view('admin.category-service.edit', compact('category', 'page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoryService = KategoriService::find($id);

        $messages=[
            'title.required' => 'Kategori harus diisi',
        ];

        $request->validate([
            'title' => 'required',
        ], $messages
        );

        $categoryService->title = $request->title;
        $categoryService->slug = Str::slug($request->title);
        $categoryService->save();

        return redirect('/admin/category-service')->with('message', "Data berhasil diubah");;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $destroy = KategoriBlog::find($id);
            $destroy->delete();
            return redirect('/admin/category-service')->with('message', "Data berhasil dihapus");
            ;
        } catch (\Exception $th) {
            return redirect('/admin/category-service');
        }
    }
}
