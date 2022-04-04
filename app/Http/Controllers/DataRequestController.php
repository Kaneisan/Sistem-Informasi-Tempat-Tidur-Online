<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelayanan;
use App\Models\Barang;
use App\Models\Req;

class DataRequestController extends Controller
{
    public function index()
    {
        $pelayanan=Pelayanan::all();
        $barang=Barang::all();
        return view(
            'admin.barang.dataRequest',
        [
            'tittle' => 'Data Request Barang'
        ]);
// teknisi mengisi form req
// status mengikuti jika nama request barang == stock barang (ada di db barang)
// jika barang ada = stock langsung berkurang dan status menjadi selesai
// jika barang baru menunggu admin barang menginputkan database barang tersebut ke tabel barang
    }
}
