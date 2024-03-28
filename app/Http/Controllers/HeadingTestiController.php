<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\HeadingTestimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HeadingTestiController extends Controller
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
        $headingtesti = HeadingTestimonial::all();
        return view('admin.heading-testi.index', compact('headingtesti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.heading-testi.create');
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
        ];

        $validateData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'desc' => 'required',
            'image' => 'required',
        ], $messages
        );

        $data = HeadingTestimonial::create($validateData);
        if ($request->hasFile('image')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('image')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('heading/', $newFileName);

            $data->image = $newFileName;
            $data->save();
        }

        return redirect('/admin/heading-testi')->with('pesan', 'Data Anda Berhasil di Tambahkan');
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
        $headingTesti = HeadingTestimonial::find($id);
        return view('admin/heading-testi/edit', compact('headingTesti'));
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
        $headingTesti = HeadingTestimonial::find($id);

        if($request->hasFile('image')) {

            //hapus old img
            File::delete('heading/' . $headingTesti->image);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('image')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('heading/', $newFileName);
            $headingTesti->image = $newFileName;

        }

        $headingTesti->title = $request->title;
        $headingTesti->desc = $request->desc;
        $headingTesti->subtitle = $request->subtitle;
        $headingTesti->save();

        return redirect('/admin/heading-testi')->with('pesan', 'Data Anda Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HeadingTestimonial::destroy($id);
        return redirect('/admin/heading-testi')->with('pesan', 'Data Berhasil Dihapus');
    }
}
