<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ConfigController extends Controller
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
        $config = Config::all();
        return view('admin.config.index', compact('config'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.config.create');
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
            'logo.required' => 'Gambar harus diisi',
            'favicon.required' => 'Gambar harus diisi',
            'breadcrumb.required' => 'Gambar harus diisi',
            'copyright1.required' => 'Copyright harus diisi',
            'copyright2.required' => 'Copyright harus diisi',
            'meta_keyword.required' => 'Meta Keyword harus diisi',
            'meta_description.required' => 'Meta Description harus diisi',
        ];

        $validateData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'copyright1' => 'required',
            'logo' => 'required',
            'favicon' => 'required',
            'breadcrumb' => 'required',
            'copyright2' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
        ], $messages
        );

        $data = Config::create($validateData);

        if ($request->hasFile('favicon')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('favicon')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('favicon')->move('galeries/config/favicon/', $newFileName);

            $data->favicon = $newFileName;
            $data->save();
        }
        if ($request->hasFile('logo')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('logo')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('logo')->move('galeries/config/logo/', $newFileName);

            $data->logo = $newFileName;
            $data->save();
        }
        if ($request->hasFile('breadcrumb')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('breadcrumb')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('breadcrumb')->move('galeries/config/breadcrumb/', $newFileName);

            $data->breadcrumb = $newFileName;
            $data->save();
        }

        return redirect('/admin/config')->with('pesan', 'Data Anda Berhasil di Tambahkan');
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
        $config = Config::find($id);
        return view('admin/config/edit', compact('config'));
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
        $data = Config::find($id);

        if($request->hasFile('favicon')) {

            //hapus old img
            File::delete('galeries/config/favicon/' . $data->favicon);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('favicon')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('favicon')->move('galeries/config/favicon/', $newFileName);
            $data->favicon = $newFileName;

        }
        if($request->hasFile('logo')) {

            //hapus old img
            File::delete('galeries/config/logo/' . $data->logo);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('logo')->move('galeries/config/logo/', $newFileName);
            $data->logo = $newFileName;

        }
        if($request->hasFile('breadcrumb')) {

            //hapus old img
            File::delete('galeries/config/breadcrumb/' . $data->breadcrumb);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('breadcrumb')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('breadcrumb')->move('galeries/config/breadcrumb/', $newFileName);
            $data->breadcrumb = $newFileName;

        }

        $data->title = $request->title;
        $data->subtitle = $request->subtitle;
        $data->copyright1 = $request->copyright1;
        $data->copyright2 = $request->copyright2;
        $data->meta_keyword = $request->meta_keyword;
        $data->meta_description = $request->meta_description;
        $data->save();
        return redirect('/admin/config')->with('pesan', 'Data Anda Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Config::destroy($id);
        return redirect('/admin/config')->with('pesan', 'Data Berhasil Dihapus');
    }
}
