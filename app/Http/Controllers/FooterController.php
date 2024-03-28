<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FooterController extends Controller
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
        $page = "Footer";
        $footers = Footer::all();
        return view('admin.footer.index', compact('page', 'footers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = "Footer | Add";
        return view('admin.footer.create', compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
            'title.required' => 'Judul harus diisi',
            'subtitle.required' => 'Sub Judul harus diisi',
            'desc.required' => 'Desc harus diisi',
            'image.required' => 'Gambar harus diisi',
            'fb.required' => 'Facebook harus diisi',
            'ig.required' => 'Instagram harus diisi',
        ];

        $validateData = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'subtitle' => 'required',
            'image' => 'required',
            'ig' => 'required',
            'fb' => 'required',
        ], $messages
        );

        $data = Footer::create($validateData);

        if ($request->hasFile('image')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('image')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('footers/', $newFileName);

            $data->image = $newFileName;
            $data->save();
        }

        return redirect('/admin/footer')->with('pesan', 'Data Anda Berhasil di Tambahkan');
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
        $footer = Footer::find($id);
        return view('admin/footer/edit', compact('footer'));
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
        $data = Footer::find($id);
        $data->update($request->all());
        if($request->hasFile('image')) {

            //hapus old img
            File::delete('galeries/config/image/' . $data->image);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('image')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('footers/', $newFileName);
            $data->image = $newFileName;

        }

        return redirect('/admin/footer')->with('pesan', 'Data Anda Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Footer::destroy($id);
        return redirect('/admin/footer')->with('pesan', 'Data Berhasil Dihapus');
    }
}
