<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelayanan;
use App\Models\Barang;
use App\Models\Req;

class FormRequestController extends Controller
{
    public function index()
    {
        $pelayanans = Pelayanan::all();
        $barangs = Barang::all();
        return view('teknisi.formRequest', [
            'tittle' => 'Form Request Barang',
            'Pelayanan' => $pelayanans,
            'Barang' => $barangs,
        ]);
    }

    public function create(Request $request)
    {
        $cekbarang = $request->input("barang_req");
        $cekbarangbaru = $request->input("barang_req_baru");
        $qty = $request->input("banyak_req");
        // $test2 = Barang::where('name', '=', $cekbarang)->first()->name;
        $cekdb = Barang::where('name',$cekbarang)->first();
        // dd($test3);
        // dd($cekbarangbaru);
        // die();
        if($cekbarang){
            if($cekdb){
                $reqs = Req::create([
                    'barang_service' => $request->input("barang_service"),
                    'barang_req' => $request->input("barang_req"),
                    'barang_req_baru' => $request->input("barang_req_baru"),
                    'banyak_req' => $request->input("banyak_req"),
                ]);
                $barangs = Barang::where('name', '=', $cekbarang)->first();
                $barangs->stock -= $qty;
                $barangs->update();
            }else{
                if($cekbarangbaru){
                    $reqs = Req::create([
                        'barang_service' => $request->input("barang_service"),
                        'barang_req' => $request->input("barang_req"),
                        'barang_req_baru' => $request->input("barang_req_baru"),
                        'banyak_req' => $request->input("banyak_req"),
                    ]);
                    // echo "true";
                }else{
                    echo "barang_req_baru harap diisi";
                }
            }
        }else{
            echo "barang_req harap diisi";
        }
        return redirect('/request');
    }

    public function request_table()
    {

    }
}
