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
            'author' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'published_at' => 'required'
        ]);


        $artikel = new Artikel();

        $artikel->title = $request->title;
        $artikel->author = $request->author;
        $artikel->content = $request->content;

        $file = $request->file('image');
        $nama_file = time()."_".$file->getClientOriginalName();
        $request->file('image')->move("media/",$nama_file);

        $artikel->image = $nama_file;

        if($request->has('draft')){
            $status = 'draft';
        }else{
            $status = 'published';
        }

        $artikel->status = $status;
        $artikel->published_at = $request->published_at;
        $artikel->save();

        return redirect('/dashboard')->with('status', 'Add Artikel Success');

        

        // Artikel::create([
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'image' => $nama_file,
        //     'published_at' => $request->published_at
        // ]);

        // Artikel::create($request->all());

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
        $request->validate([
            'title' => 'required|max:30',
            'author' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'published_at' => 'required'
        ]);

        $update = Artikel::find($artikel->id);

        $update->title = $request->title;
        $update->author = $request->author;
        $update->content = $request->content;

        if($request->hasfile('image')){
            $file = $request->file('image');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->move("media/",$nama_file);

            $update->image = $nama_file;
        }

        if($request->has('draft')){
            $status = 'draft';
        }else{
            $status = 'published';
        }
        $update->status = $status;
        $update->published_at = $request->published_at;

        $update->save();
        return redirect('/dashboard')->with('status', 'Update Artikel Success');

        // Artikel::where('id', $artikel->id)->update([
        //     'title' => $request->title,
        //     'content' => $request->content,
        //     'published_at' => $request->published_at
        // ]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        // $image = Artikel::where($artikel->id);
        // File::delete('media/'.$artikel->image);

        Artikel::destroy($artikel->id);

        return redirect('/dashboard')->with('status', 'Delete Artikel Success');
    }
}
