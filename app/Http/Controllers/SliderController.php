<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $slider_count = Slider::count();
        $slider = Slider::all();
        return view('admin.slider.index', compact('slider', 'slider_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'title.required' => 'Judul Slider harus diisi',
            'subtitle.required' => 'Sub Judul Slider harus diisi',
            'image.required' => 'Gambar Slider harus diisi',
        ];

        $validateData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'required',
        ], $messages
        );

        $data = Slider::create($validateData);

        if($request->hasFile('image')){
            $request->file('image')->move('galeries/slider', $request->file('image')->getclientOriginalName());
            $data->image = $request->file('image')->getclientOriginalName();
            $data->save();
        }

        return redirect('/admin/slider')->with('pesan', 'Data Anda Berhasil di Tambahkan');
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
        $slider = Slider::find($id);
        return view('admin/slider/edit', compact('slider'));
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
        $data = Slider::find($id);
        $data->update($request->all());

        if($request->hasFile('image')){
            $request->file('image')->move('galeries/slider/', $request->file('image')->getclientOriginalName());
            $data->image = $request->file('image')->getclientOriginalName();
            $data->save();
        }

        return redirect('/admin/slider')->with('pesan', 'Data Anda Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::destroy($id);
        return redirect('/admin/slider')->with('pesan', 'Data Berhasil Dihapus');
    }
}
