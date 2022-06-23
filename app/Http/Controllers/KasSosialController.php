<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\KasSosial;

class KasSosialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function rekap()
    {
        $data = KasSosial::all();
        // dd($data);

        return view('kassosial.rekap',compact('data'));
    }


    public function masuk() {
        $data = KasSosial::where('jenis','masuk')->get();

        return view('kassosial.masuk',compact('data'));
    }
    
    public function keluar() {
        $data = KasSosial::where('jenis','keluar')->get();

        return view('kassosial.keluar',compact('data'));
    }

    //tambah data kas sosial
    public function storePemasukan(Request $request) {
        $this->validate($request,[
            'tanggal'=> 'required',
            'uraian' => 'required',
            'masuk' => 'required',

        ]);
        $data = new KasSosial();
        $data-> tanggal = $request-> tanggal;
        $data-> uraian = $request-> uraian;
        $data-> masuk = $request-> masuk;
        $data-> jenis = 'masuk';
        $data-> save();

        return redirect()->back();
        
    }


    public function storePengeluaran(Request $request) {
        $this->validate($request,[
            'tanggal'=> 'required',
            'uraian' => 'required',
            'keluar' => 'required',

        ]);
        $data = new KasSosial();
        $data-> tanggal = $request-> tanggal;
        $data-> uraian = $request-> uraian;
        $data-> keluar = $request-> keluar;
        $data-> jenis = 'keluar';
        $data-> save();

        return redirect()->back();
        
    }
    
    //edit data kas sosial
    public function editPemasukan(Request $request,$id) {
        $data = KasSosial::where('id',$id)->firstOrFail();

        $request->validate([
            'tanggal'=> 'required',
            'uraian' => 'required',
            'masuk' => 'required',
        ]);
        // dd($request);

        $data->tanggal = $request->tanggal;
        $data->uraian = $request->uraian;
        $data->masuk = $request->masuk;
        $data->update();

        return redirect()->back();
    }

    public function editPengeluaran(Request $request,$id) {
        $data = KasSosial::where('id',$id)->firstOrFail();

        $request->validate([
            'tanggal'=> 'required',
            'uraian' => 'required',
            'keluar' => 'required',
        ]);
        // dd($request);

        $data->tanggal = $request->tanggal;
        $data->uraian = $request->uraian;
        $data->keluar = $request->keluar;
        // dd($data);
        $data->update();

        return redirect()->back();
    }


    public function destroy($id)
    {
        $data = KasSosial::find($id);

        $data->delete();

        return redirect()->back();
    }
}
