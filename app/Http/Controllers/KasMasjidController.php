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

    public function cetak_periode_pdf(Request $request)
    {

        $tgl1 = carbon::parse($request->tgl1)->format('Y-m-d H:i:s');
        $tgl2 = carbon::parse($request->tgl2)->format('Y-m-d H:i:s');
        $data = KasMasjid::whereBetween('tanggal', [$tgl1, $tgl2])->orderBy('tanggal','asc')->get();
        $data2 = ProfileMasjid::all();

        // // dd($data);
        // $pdf = PDF::loadview('pdf.rekap_periode_pdf', [
        //     'data' => $data,
        //     'tgl1' => $tgl1,
        //     'tgl2' => $tgl2,
        //     'profile' => $profile,
        //     'tot_all' => $tot_all,
        //     'tot_m' => $tot_m,
        //     'tot_k' => $tot_k,
        //     'tot_r' => $tot_r,
        // ]);
            // dd($data);
        $pdf = PDF::loadview('kasmasjid.rekap_periode_pdf',[
            'data'=>$data,
            'data2'=>$data2,
            'tgl1' => $tgl1,
            'tgl2' => $tgl2,
        ]);

        return $pdf->download('laporan-rekap-periode-barang.pdf');
    }

    public function masuk() {
        $data = KasMasjid::where('jenis','masuk')->get();

        return view('kasmasjid.masuk',compact('data'));
    }
    
    public function keluar() {
        $data = KasMasjid::where('jenis','keluar')->get();

        return view('kasmasjid.keluar',compact('data'));
    }

    //tambah data Kas KarTar
    public function storePemasukan(Request $request) {
        $this->validate($request,[
            'tanggal'=> 'required',
            'uraian' => 'required',
            'masuk' => 'required',

        ]);
        $data = new KasMasjid();
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
        $data = new KasMasjid();
        $hasil = preg_replace("/[^0-9]/", "", $request->keluar);
        $data-> tanggal = $request-> tanggal;
        $data-> uraian = $request-> uraian;
        $data-> keluar = $hasil;
        $data-> jenis = 'keluar';
        $data-> save();

        Alert::success('Sukses!','Berhasil Menambah Data');
        return redirect()->back();
        
    }

    //edit data Kas KarTar
    public function editPemasukan(Request $request,$id) {
        $data = KasMasjid::where('id',$id)->firstOrFail();

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
        $data = KasMasjid::where('id',$id)->firstOrFail();

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

    //delete data Kas KarTar
    public function destroy($id)
    {
        $data = KasMasjid::find($id);

        $data->delete();

        return redirect()->back();
    }
}
