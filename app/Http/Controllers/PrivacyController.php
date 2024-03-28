<?php

namespace App\Http\Controllers;

use App\Models\Privacy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
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
        $privacy = Privacy::all();

        return view('admin.privacy.index', compact('privacy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.privacy.create');
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
            'title.required' => 'Title harus diisi',
            'subtitle.required' => 'Subtitle harus diisi',
            'desc.required' => 'Desc harus diisi',
        ];

        $validateData = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'desc' => 'required',
        ], $messages
        );

        $data = Privacy::create($validateData);
        $data->save();

        return redirect('/admin/privacy')->with('pesan', 'Data Anda Berhasil di Tambahkan');
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
        $privacy = Privacy::find($id);
        return view('admin/privacy/edit', compact('privacy'));
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
        $data = Privacy::find($id);

        $data->title = $request->title;
        $data->subtitle = $request->subtitle;
        $data->desc = $request->desc;
        $data->save();

        return redirect('/admin/privacy')->with('pesan', 'Data Anda Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Privacy::destroy($id);
        return redirect('/admin/privacy')->with('pesan', 'Data Berhasil Dihapus');
    }
}
