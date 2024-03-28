<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\HeadingBenefit;
use App\Models\HeadingTestimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HeadingBenefitController extends Controller
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
        $page = "Heading Benefit";
        $headingbenefit = HeadingBenefit::all();
        return view('admin.heading-benefit.index', compact('headingbenefit', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = "Heading Benefit | Create";
        return view('admin.heading-benefit.create', compact('page'));
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

        $data = HeadingBenefit::create($validateData);
        if ($request->hasFile('image')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('image')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('heading/benefit/', $newFileName);

            $data->image = $newFileName;
            $data->save();
        }

        return redirect('/admin/heading-benefit')->with('pesan', 'Data Anda Berhasil di Tambahkan');
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
        $headingBenefit = HeadingBenefit::find($id);
        return view('admin/heading-benefit/edit', compact('headingBenefit'));
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
        $headingBenefit = HeadingBenefit::find($id);

        if($request->hasFile('image')) {

            //hapus old img
            File::delete('heading/benefit/' . $headingBenefit->image);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('image')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('heading/benefit/', $newFileName);
            $headingBenefit->image = $newFileName;

        }

        $headingBenefit->title = $request->title;
        $headingBenefit->desc = $request->desc;
        $headingBenefit->subtitle = $request->subtitle;
        $headingBenefit->save();

        return redirect('/admin/heading-benefit')->with('pesan', 'Data Anda Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HeadingBenefit::destroy($id);
        return redirect('/admin/heading-benefit')->with('pesan', 'Data Berhasil Dihapus');
    }
}
