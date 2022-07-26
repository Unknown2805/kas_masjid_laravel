<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\KasSosial;
use App\Models\ProfileMasjid;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;

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
        $data2 = ProfileMasjid::all();
        // dd($data);

        return view('kassosial.rekap',compact('data','data2'));
    }

    public function cetak_pdf() {
        $data = KasSosial::all();
        $data2 = ProfileMasjid::all();

        $pdf = PDF::loadview('kassosial.rekap_pdf',['data'=>$data,'data2'=>$data2]);
            
        return $pdf->download('laporan-kas-sosial.pdf');


    }


    public function masuk() {
        $data = KasSosial::where('jenis','masuk')->get();

        return view('kassosial.masuk',compact('data'));
    }
    
    public function keluar() {
        $data = KasSosial::where('jenis','keluar')->get();

        return view('kassosial.keluar',compact('data'));
    }
//tambah kas sosial
    public function storePemasukan(Request $request) {
        $this->validate($request,[
            'tanggal'=> 'required',
            'uraian' => 'required',
            'masuk' => 'required',

        ]);
        $data = new KasSosial();
        $result = preg_replace("/[^0-9]/", "", $request->masuk);
        $data-> tanggal = $request-> tanggal;
        $data-> uraian = $request-> uraian;
        $data-> masuk = $result;
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
        $data = new KasSosial();
        $hasil = preg_replace("/[^0-9]/", "", $request->keluar);
        $data-> tanggal = $request-> tanggal;
        $data-> uraian = $request-> uraian;
        $data-> keluar = $hasil;
        $data-> jenis = 'keluar';
        $data-> save();

        Alert::success('Sukses!','Berhasil Menambah Data');
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

        $result = preg_replace("/[^0-9]/", "", $request->masuk);
        $data-> tanggal = $request-> tanggal;
        $data-> uraian = $request-> uraian;
        $data-> masuk = $result;
        $data->update();

        Alert::success('Sukses!','Berhasil Merubah Data');

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

        $hasil = preg_replace("/[^0-9]/", "", $request->keluar);
        $data-> tanggal = $request-> tanggal;
        $data-> uraian = $request-> uraian;
        $data-> keluar = $hasil;
        // dd($data);
        $data->update();

        // Alert::success('Sukses!','Berhasil Merubah Data');
        return redirect()->back();
    }



    public function destroy($id)
    {
        $data = KasSosial::find($id);

        $data->delete();

        Alert::success('Sukses!','Berhasil Menghapus Data');
        return redirect()->back();
    }
}
