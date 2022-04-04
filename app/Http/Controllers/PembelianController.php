<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Laporanpenjualan;

class PembelianController extends Controller
{
    public function index()
    {
        return view('admin.pembelian.Mpembelian', ['tittle' => 'Pembelian']);
    }
    public function create(Request $request)
    {
        $stock = $request->stock;
        $kondisiBarang = $request->id_barang;
        if ($kondisiBarang != null) {
            $barangs = Barang::find($request->id_barang);
            $barangs->stock += $stock;
            $barangs->update();
        } else {
            $barang = Barang::create([
                'code' => $request->code,
                'name' => $request->name,
                'merk' => $request->merk,
                'stock' => $stock = $request->stock,
                'harga_jual' => $hj = $request->harga_jual,
                'harga_beli' => $hb = $request->harga_beli,
                'total_beli' => $hb * $stock,
                'laba' => $hj - $hb,
                'status' => $request->status,
            ]);
            // dd($barang);
            // die();
        }
        Laporanpenjualan::create([
            'id_barang' => $barang->id_barang,
            'total_pembelian' => $barang->total_beli,
            'banyak_pembelian' => $barang->stock,
        ]);
        $notifikasi = array(
            'pesan' => 'User berhasil ditambahkan',
            'alert' => 'success',
        );

        return redirect('/barang')->with($notifikasi);
    }
}
