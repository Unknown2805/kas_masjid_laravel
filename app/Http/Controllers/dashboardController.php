<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\KasMasjid;
use App\Models\KasSosial;
use App\Models\ProfileMasjid;

class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function dashboard()
    {
        $data = ProfileMasjid::all();
        $masjid = KasMasjid::all();
        $sosial = KasSosial::all();

        
        

        if(!isset($masjid)){
            $tot_in_m = "0";
            $tot_out_m = "0";

        }else{
            $tot_in_m = $masjid->sum('masuk');
            $tot_out_m = $masjid->sum('keluar');

        }

        if(!isset($sosial)){
            $tot_in_s = "0";
            $tot_out_s = "0";

        }else{
            $tot_in_s = $sosial->sum('masuk');
            $tot_out_s = $sosial->sum('keluar');

        }
        
        $rek_m = $tot_in_m - $tot_out_m;
        $rek_s = $tot_in_s - $tot_out_s;

        return view('dashboard', compact('data', 'tot_in_m', 'tot_out_m', 'rek_m', 'tot_in_s', 'tot_out_s', 'rek_s'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
        //
    }
}
