<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class ArtikelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = Artikel::all();

        return view('artikel.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'title' => 'required|max:30',
            'content' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'published_at' => 'required',
        ]);

        // $file = $request->file('image');
        // $nama_file = time()."_".$file->getClientOriginalName();
        // $tujuan_upload = 'public/media/';
        // $file->move($tujuan_upload,$nama_file);

        // Artikel::create([
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'image' => $nama_file,
        //     'published_at' => $request->published_at
        // ]);

        Artikel::create($request->all());

        return redirect('/dashboard')->with('status', 'Add Artikel Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        return view('artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        $artikel->validate([
            'title' => 'required|max:30',
            'content' => 'required',
            'published_at' => 'required',
        ]);

        Artikel::where('id', $artikel->id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'published_at' => $request->published_at
        ]);

        return redirect('/dashboard')->with('status', 'Update Artikel Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        Artikel::destroy($artikel->id);

        return redirect('/dashboard')->with('status', 'Delete Artikel Success');
    }
}
