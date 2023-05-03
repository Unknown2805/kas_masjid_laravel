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
        
        // dd($request);      


        if($request->image && $request->masjid){
            $img = $request->file('image');
            $filename = $img->getClientOriginalName();
    
            if ($request->hasFile('image')) {
                $request->file('image')->storeAs('/masjid',$filename);
            }
            $image = $request->file('image')->getClientOriginalName();
            
            $data = ProfileMasjid::where('id',$id)->first();
            $data->update([
                'masjid' => $request->masjid,
                'image' => $image,
            ]);
        }elseif($request->image && $request->masjid === null){

            $img = $request->file('image');
            $filename = $img->getClientOriginalName();
    
            if ($request->hasFile('image')) {
                $request->file('image')->storeAs('/masjid',$filename);
            }
            $image = $request->file('image')->getClientOriginalName();
            
            $data = ProfileMasjid::where('id',$id)->first();
            $data->update([
                'image' => $image,
            ]);
        }elseif($request->image === null && $request->masjid){
            
            $data = ProfileMasjid::where('id',$id)->first();
            $data->update([
                'masjid' => $request->masjid,
            ]);
        }
       
        return redirect()->back();
    }
}
