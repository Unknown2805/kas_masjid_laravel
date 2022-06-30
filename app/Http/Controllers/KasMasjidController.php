<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KasMasjid;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Carbon;
use App\Models\ProfileMasjid;
use RealRashid\SweetAlert\Facades\Alert;


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
        $data2 = ProfileMasjid::all();
        
        // dd($data);

        return view('kasmasjid.rekap',compact('data','data2'));
    }

    public function cetak_pdf() {
        $data = KasMasjid::all();
        $data2 = ProfileMasjid::all();


        $pdf = PDF::loadview('kasmasjid.rekap_pdf',['data'=>$data,'data2'=>$data2]);
            
        return $pdf->download('laporan-kas-masjid.pdf');


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

        Alert::success('Sukses!','Berhasil Menambah Data');
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

        Alert::success('Sukses!','Berhasil Menambah Data');
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

        Alert::success('Sukses!','Berhasil Merubah Data');

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

        Alert::success('Sukses!','Berhasil Merubah Data');
        return redirect()->back();
    }

    //delete data kas masjid
    public function destroy($id)
    {
        $data = KasMasjid::find($id);

        $data->delete();

        Alert::success('Sukses!','Berhasil Menghapus Data');
        return redirect()->back();
    }
}
