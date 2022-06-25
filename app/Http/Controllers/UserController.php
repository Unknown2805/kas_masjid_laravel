<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $id_user = user::all();
        $user = User::orderBy('name', 'ASC')->role('admin')->get();
        return view('admin')
            ->with('user', $user);
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
            "name" => 'required',
            "email" => 'required',
            "password" => 'required|min:8'
        ]);
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->save();
        $data->assignRole('admin');

        return redirect()->route('user.index')->with('success', 'Task Created Successfully!');
    }

    public function editPp(Request $request)

    {
        $data = User::where('id', Auth::user()->id)->firstOrFail();
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
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();
        return redirect('/admin');
    }
}
