<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class BendaharaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $id_user = user::all();
        $bendahara = User::orderBy('name', 'ASC')->role('bendahara')->get();
        return view('bendahara')
            ->with('bendahara', $bendahara);

        // ->with('id_bendahara', $id_bendahara);
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
        $data->assignRole('bendahara');

        Alert::success('Sukses!','Berhasil Menambah Data');
        return redirect()->route('bendahara.index')->with('success', 'Task Created Successfully!');
    }
    public function edit(Request $request, $id){
        if($request->password){

            $edit = User::find($id)->update([
                        "name" => $request->name,
                        "email" => $request->email,
                        "password" => bcrypt($request->password)
                    ]);
        }else{
            
            $edit = User::find($id)->update([
                "name" => $request->name,
                "email" => $request->email,
            ]);
        }


        Alert::success('Sukses!', 'Berhasil Mengedit Data');
        return redirect()->back()->with('success', 'Task Updated Successfully!');
    }

    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();
        
        Alert::success('Sukses!','Berhasil Menghapus Data');
        return redirect('/bendahara');
    }
}
