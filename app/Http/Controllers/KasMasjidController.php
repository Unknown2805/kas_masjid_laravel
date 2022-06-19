<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasMasjid;
use Illuminate\Support\Facades\Redis;

class KasMasjidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rekap()
    {
        $data = KasMasjid::all();
        // dd($data);

        return view('kasmasjid.rekap',compact('data'));
    }

    public function masuk() {
        $data = KasMasjid::where('jenis','masuk')->get();

        return view('kasmasjid.masuk',compact('data'));
    }
    
    public function keluar() {
        $data = KasMasjid::where('jenis','keluar')->get();

        return view('kasmasjid.keluar',compact('data'));
    }

    //tambah data kas masjid
    public function storePemasukan(Request $request) {
        $this->validate($request,[
            'tanggal'=> 'required',
            'uraian' => 'required',
            'masuk' => 'required',

        ]);
        $data = new KasMasjid();
        $data-> tanggal = $request-> tanggal;
        $data-> uraian = $request-> uraian;
        $data-> masuk = $request-> masuk;
        $data-> jenis = 'masuk';
            // dd($data);
        $data-> save();

        return redirect()->back();
        
    }

    public function storePengeluaran(Request $request) {
        $this->validate($request,[
            'tanggal'=> 'required',
            'uraian' => 'required',
            'keluar' => 'required',

        ]);
        $data = new KasMasjid();
        $data-> tanggal = $request-> tanggal;
        $data-> uraian = $request-> uraian;
        $data-> keluar = $request-> keluar;
        $data-> jenis = 'keluar';
        $data-> save();

        return redirect()->back();
        
    }

    //edit data kas masjid
    public function editPemasukan(Request $request,$id) {
        $data = KasMasjid::where('id',$id)->firstOrFail();

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
        $data = KasMasjid::where('id',$id)->firstOrFail();

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

    //delete data kas masjid
    public function destroy($id)
    {
        $data = KasMasjid::find($id);

        $data->delete();

        return redirect()->back();
    }
}
