<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AboutController extends Controller
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
        $about_count = About::count();
        $about = About::all();
        return view('admin.about.index', compact('about', 'about_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
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
            'image.required' => 'Gambar harus diisi',
            'image2.required' => 'Gambar harus diisi',
            'image3.required' => 'Gambar harus diisi',
            'overview.required' => 'Overview harus diisi',
            'desc.required' => 'Deskripsi harus diisi',
            'tahun.required' => 'Tahun harus diisi',
        ];

        $validateData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'overview' => 'required',
            'image' => 'required',
            'image2' => 'required',
            'image3' => 'required',
            'desc' => 'required',
            'tahun' => 'required',
        ], $messages
        );

        $data = About::create($validateData);

        if ($request->hasFile('image')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('image')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('galeries/about/', $newFileName);

            $data->image = $newFileName;
            $data->save();
        }
        if ($request->hasFile('image2')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('image2')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image2')->move('galeries/about/', $newFileName);

            $data->image2 = $newFileName;
            $data->save();
        }
        if ($request->hasFile('image3')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('image3')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image3')->move('galeries/about/', $newFileName);

            $data->image3 = $newFileName;
            $data->save();
        }

        return redirect('/admin/about')->with('pesan', 'Data Anda Berhasil di Tambahkan');
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
        $about = About::find($id);
        return view('admin/about/edit', compact('about'));
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
        $about = About::find($id);

        if($request->hasFile('image')) {

            //hapus old img
            File::delete('galeries/about/' . $about->image);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('image')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('galeries/about/', $newFileName);
            $about->image = $newFileName;

        }
        if($request->hasFile('image2')) {

            //hapus old img
            File::delete('galeries/about/' . $about->image2);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('image2')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image2')->move('galeries/about/', $newFileName);
            $about->image2 = $newFileName;

        }
        if($request->hasFile('image3')) {

            //hapus old img
            File::delete('galeries/about/' . $about->image3);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('image3')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image3')->move('galeries/about/', $newFileName);
            $about->image3 = $newFileName;

        }

        $about->title = $request->title;
        $about->desc = $request->desc;
        $about->overview = $request->overview;
        $about->subtitle = $request->subtitle;
        $about->tahun = $request->tahun;
        $about->save();

        return redirect('/admin/about')->with('pesan', 'Data Anda Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        About::destroy($id);
        return redirect('/admin/about')->with('pesan', 'Data Berhasil Dihapus');
    }
}
