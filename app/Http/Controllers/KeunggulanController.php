<?php

namespace App\Http\Controllers;

use App\Models\Keunggulan;
use Illuminate\Http\Request;

class KeunggulanController extends Controller
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
        $unggul = Keunggulan::latest()->get();

        return view('admin.keunggulan.index', compact('unggul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.keunggulan.create');
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
            'judul.required' => 'Judul Keunggulan harus diisi',
            'desk.required' => 'Desk Keunggulan harus diisi',
            'image.required' => 'Gambar harus diisi',
        ];

        $validateData = $request->validate([
            'judul' => 'required',
            'desk' => 'required',
            'image' => 'required',
        ], $messages
        );

        $data = Keunggulan::create($validateData);

        if($request->hasFile('image')){
            $request->file('image')->move('galeries/keunggulan', $request->file('image')->getclientOriginalName());
            $data->image = $request->file('image')->getclientOriginalName();
            $data->save();
        }

        return redirect('/admin/keunggulan')->with('pesan', 'Data Anda Berhasil di Tambahkan');
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
        $unggul = Keunggulan::find($id);
        return view('admin/keunggulan/edit', compact('unggul'));
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
        $data = Keunggulan::find($id);
        $data->update($request->all());

        if($request->hasFile('image')){
            $request->file('image')->move('galeries/keunggulan/', $request->file('image')->getclientOriginalName());
            $data->image = $request->file('image')->getclientOriginalName();
            $data->save();
        }

        return redirect('/admin/keunggulan')->with('pesan', 'Data Anda Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Keunggulan::destroy($id);
        return redirect('/admin/keunggulan')->with('pesan', 'Data Berhasil Dihapus');
    }
}
