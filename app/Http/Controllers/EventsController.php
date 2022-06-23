<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Events::all();
        return view('events.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|file|max:3072',
            'judul' => 'required',
            'konten' => 'required',
        ]);

        $data = new Events();
        $data->judul = $request->judul;
        $data->konten = $request->konten;
        
        $img = $request->file('gambar');
        $filename = $img->getClientOriginalName();

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->storeAs('/event',$filename);
        }
        $data->gambar = $request->file('gambar')->getClientOriginalName();
        // dd($data);

        $data->save();

        return redirect()->back();
    }
    
    public function editEvent(Request $request,$id){
        $data = Events::where('id',$id)->firstOrFail();

        $request->validate([
            'gambar' => 'required|file|max:3072',
            'judul' => 'required',
            'konten' => 'required',
        ]);

        $data->judul = $request->judul;
        $data->konten = $request->konten;
        
        $img = $request->file('gambar');
        $filename = $img->getClientOriginalName();

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->storeAs('/event',$filename);
        }
        $data->gambar = $request->file('gambar')->getClientOriginalName();
        // dd($data);
        $data->update();

        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Events::find($id);

        if ($data->gambar) {
            Storage::delete('/event/' . $data->gambar);
        }
        $data->delete();

        return redirect()->back();
    }
}
