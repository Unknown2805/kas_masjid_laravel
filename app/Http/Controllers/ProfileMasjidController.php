<?php

namespace App\Http\Controllers;

use App\Models\ProfileMasjid;
use Illuminate\Http\Request;

class ProfileMasjidController extends Controller
{

    public function index()
    {
       $data = ProfileMasjid::all();
       return view('dashboard',compact('data'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|file|max:3072',
            'masjid' => 'required',
     
        ]);

        $data = new ProfileMasjid();
        $data->masjid = $request->masjid;
        
        
        $img = $request->file('image');
        $filename = $img->getClientOriginalName();

        if ($request->hasFile('image')) {
            $request->file('image')->storeAs('/masjid',$filename);
        }
        $data->image = $request->file('image')->getClientOriginalName();
        // dd($data);

        $data->save();

        return redirect()->back();
    }

    public function editMasjid(Request $request,$id){
        $data = ProfileMasjid::where('id',$id)->firstOrFail();

        $request->validate([
            'image' => 'required|file|max:3072',
            'masjid' => 'required',
            
        ]);

        $data->masjid = $request->masjid;
       
        
        $img = $request->file('image');
        $filename = $img->getClientOriginalName();

        if ($request->hasFile('image')) {
            $request->file('image')->storeAs('/masjid',$filename);
        }
        $data->image = $request->file('image')->getClientOriginalName();
        // dd($data);
        $data->update();

        return redirect()->back();
    }
}
