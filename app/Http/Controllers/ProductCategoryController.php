<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriProduct;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductCategoryController extends Controller
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
        $categories = KategoriProduct::latest()->get();
        $page = 'Category';
        return view(
            'admin.category-product.index',
            compact('categories', 'page')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $page = 'Category | Create';
        return view('admin.category-product.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'Kategori harus diisi',
            'icon.required' => 'Icon harus diisi',
        ];

        $request->validate(
            [
                'title' => 'required',
                'icon' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            $messages
        );

        $data = KategoriProduct::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'slug' => Str::slug($request->title),
        ]);

        if ($request->hasFile('icon')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('icon')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('icon')->move('products/icon/', $newFileName);

            $data->icon = $newFileName;
            $data->save();
        }

        return redirect('/admin/category-product')->with(
            'message',
            'Data berhasil ditambahkan'
        );
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
        $category = KategoriProduct::find($id);
        return view('admin.category-product.edit', compact('category', 'page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoryProduct = KategoriProduct::find($id);

        $messages = [
            'title.required' => 'Kategori harus diisi',
        ];

        $request->validate(
            [
                'title' => 'required',
                'icon' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            $messages
        );

        if ($request->hasFile('icon')) {
            //hapus old img
            File::delete('products/icon/' . $categoryProduct->icon);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('icon')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('icon')->move('products/icon/', $newFileName);
            $categoryProduct->icon = $newFileName;
        }

        $categoryProduct->title = $request->title;
        $categoryProduct->slug = Str::slug($request->title);
        $categoryProduct->save();

        return redirect('/admin/category-product')->with(
            'message',
            'Data berhasil diubah'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $destroy = KategoriProduct::find($id);
            $destroy->delete();
            return redirect('/admin/category-product')->with(
                'message',
                'Data berhasil dihapus'
            );
        } catch (\Exception $th) {
            return redirect('/admin/category-product');
        }
    }
}
