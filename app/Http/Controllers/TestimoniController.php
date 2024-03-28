<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimoniController extends Controller
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
        $testimonial = Testimonial::latest()->get();
        return view('admin.testi.index', compact('testimonial') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testi.create');
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
            'nama.required' => 'Nama harus diisi',
            'profesi.required' => 'Profesi harus diisi',
            'testimoni.required' => 'Testimoni harus diisi',
            'image.required' => 'Gambar harus diisi',
        ];

        $validateData = $request->validate([
            'nama' => 'required',
            'profesi' => 'required',
            'testimoni' => 'required',
            'image' => 'required',
        ], $messages
        );

        $data = Testimonial::create($validateData);

        if($request->hasFile('image')){
            $request->file('image')->move('galeries/testimonial', $request->file('image')->getclientOriginalName());
            $data->image = $request->file('image')->getclientOriginalName();
            $data->save();
        }

        return redirect('/admin/testi')->with('pesan', 'Data Anda Berhasil di Tambahkan');
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
        $testimonial = Testimonial::find($id);
        return view('admin/testi/edit', compact('testimonial'));
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
        $data = Testimonial::find($id);
        $data->update($request->all());

        if($request->hasFile('image')){
            $request->file('image')->move('galeries/testimonial/', $request->file('image')->getclientOriginalName());
            $data->image = $request->file('image')->getclientOriginalName();
            $data->save();
        }

        return redirect('/admin/testi')->with('pesan', 'Data Anda Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Testimonial::destroy($id);
        return redirect('/admin/testi')->with('pesan', 'Data Berhasil Dihapus');
    }
}
