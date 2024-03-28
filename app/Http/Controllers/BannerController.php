<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BannerController extends Controller
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
        $banner = Banner::all();

        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            'judul.required' => 'Judul Banner harus diisi',
            'desk.required' => 'Desk Banner harus diisi',
            'image.required' => 'Gambar harus diisi',
            'image2.required' => 'Gambar harus diisi',
        ];

        $validateData = $request->validate([
            'judul' => 'required',
            'desk' => 'required',
            'image' => 'required',
            'image2' => 'required',
        ], $messages
        );

        $data = Banner::create($validateData);

        if($request->hasFile('image')){
            $request->file('image')->move('galeries/banner', $request->file('image')->getclientOriginalName());
            $data->image = $request->file('image')->getclientOriginalName();
            $data->save();
        }
        if($request->hasFile('image2')){
            $request->file('image2')->move('galeries/banner', $request->file('image2')->getclientOriginalName());
            $data->image2 = $request->file('image2')->getclientOriginalName();
            $data->save();
        }

        return redirect('/admin/banner')->with('pesan', 'Data Anda Berhasil di Tambahkan');
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
        $banner = Banner::find($id);
        return view('admin/banner/edit', compact('banner'));
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
        $data = Banner::find($id);
        if($request->hasFile('image')) {

            //hapus old img
            File::delete('galeries/banner/' . $data->image);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('image')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('galeries/banner/', $newFileName);
            $data->image = $newFileName;

        }
        if($request->hasFile('image2')) {

            //hapus old img
            File::delete('galeries/banner/' . $data->image2);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('image2')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image2')->move('galeries/banner/', $newFileName);
            $data->image2 = $newFileName;

        }

        $data->judul = $request->judul;
        $data->desk = $request->desk;
        $data->save();

        return redirect('/admin/banner')->with('pesan', 'Data Anda Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::destroy($id);
        return redirect('/admin/banner')->with('pesan', 'Data Berhasil Dihapus');
    }
}
