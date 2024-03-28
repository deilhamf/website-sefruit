<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\KategoriBlog;
use App\Models\Work;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
// use Intervention\Image\ImageManagerStatic as Image;

class WorkController extends Controller
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

        $works = Work::all();
        $page = 'Work';
        return view('admin.work.index', compact('works', 'page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = 'Work | Create';
        return view('admin.work.create', compact('page'));
    }

    /**
     * Store a newly created resource in File.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages=[
            'title.required' => 'Judul Blog Harus di isi',
            'title.unique' => 'Judul Blog Sudah Terdaftar',
            'desc.required' => 'Deskripsi Blog Harus di isi',
            'image.required' => 'Gambar tidak boleh kosong',
            'icon.required' => 'Gambar tidak boleh kosong',
        ];

        $request->validate([
            'title' => 'required|unique:blogs',
            'desc' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'icon' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $messages
        );

        $data = Work::create([
            'title' => $request->title,
            'image' => $request->image,
            'icon' => $request->icon,
            'desc' => $request->desc,
        ]);

        if ($request->hasFile('image')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('image')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('works/', $newFileName);

            $data->image = $newFileName;
            $data->save();
        }
        if ($request->hasFile('icon')) {
            $randomFileName = Str::random(20); // Menghasilkan nama acak dengan panjang 20 karakter
            $extension = $request->file('icon')->getClientOriginalExtension(); // Mendapatkan ekstensi file

            $newFileName = $randomFileName . '.' . $extension;

            $request->file('icon')->move('works/icon/', $newFileName);

            $data->icon = $newFileName;
            $data->save();
        }

        return redirect('/admin/work')->with('message', 'Data Anda Berhasil di Tambahkan');
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
        $page = 'Work | Edit';
        $work = Work::find($id);
        return view('admin.work.edit', compact('work', 'page'));
    }

    /**
     * Update the specified resource in File.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $work = Work::find($id);

        if($request->hasFile('image')) {

            //hapus old img
            File::delete('works/' . $work->image);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('image')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('image')->move('works/', $newFileName);
            $work->image = $newFileName;

        }
        if($request->hasFile('icon')) {

            //hapus old img
            File::delete('works/icon/' . $work->icon);

            //upload new img
            $randomFileName = Str::random(20);
            $extension = $request->file('icon')->getClientOriginalExtension();
            $newFileName = $randomFileName . '.' . $extension;

            $request->file('icon')->move('works/icon/', $newFileName);
            $work->icon = $newFileName;

        }

        $work->title = $request->title;
        $work->desc = $request->desc;
        $work->save();
        return redirect('/admin/work')->with('message','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from File.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $destroy = Work::find($id);
            $destroy->delete();
            return redirect('/admin/work')->with('message', "Data berhasil dihapus");
            ;
        } catch (\Exception $th) {
            return redirect('/admin/work');
        }
    }
}
