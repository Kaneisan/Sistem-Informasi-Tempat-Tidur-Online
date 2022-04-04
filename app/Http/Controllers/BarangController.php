<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $totalBarang = \DB::table('barangs')->count();
        $totalMilikToko = Barang::whereStatus('Milik Toko')->count();
        $totalMilikSuplier = Barang::whereStatus('Milik Suplier')->count();
        return view(
            'admin.barang.tabel.tabelBarang',
            [
                'tittle' => 'Manage Barang',
                'Barang' => $barangs,
                'totalBarang' => $totalBarang,
                'totalMilikToko' => $totalMilikToko,
                'totalMilikSuplier' => $totalMilikSuplier,
            ]
        );
    }
    public function filterSuplier()
    {
        $barangs = Barang::whereStatus('Milik Suplier')->get();
        $totalBarang = \DB::table('barangs')->count();
        $totalMilikToko = Barang::whereStatus('Milik Toko')->count();
        $totalMilikSuplier = Barang::whereStatus('Milik Suplier')->count();
        return view(
            'admin.barang.tabel.tabelSuplier',
            [
                'tittle' => 'Manage Barang',
                'Barang' => $barangs,
                'totalBarang' => $totalBarang,
                'totalMilikToko' => $totalMilikToko,
                'totalMilikSuplier' => $totalMilikSuplier,
            ]
        );
    }
    public function filterToko()
    {
        $barangs = Barang::whereStatus('Milik Toko')->get();
        $totalBarang = \DB::table('barangs')->count();
        $totalMilikToko = Barang::whereStatus('Milik Toko')->count();
        $totalMilikSuplier = Barang::whereStatus('Milik Suplier')->count();
        return view(
            'admin.barang.tabel.tabelSuplier',
            [
                'tittle' => 'Manage Barang',
                'Barang' => $barangs,
                'totalBarang' => $totalBarang,
                'totalMilikToko' => $totalMilikToko,
                'totalMilikSuplier' => $totalMilikSuplier,
            ]
        );
    }
    public function update(Request $request)
    {
        $barangs = Barang::find($request->id_barang);
        $barangs->id_barang = $request->id_barang;
        $barangs->code = $request->code;
        $barangs->name = $request->name;
        $barangs->merk = $request->merk;
        $barangs->stock = $request->stock;
        $barangs->harga_jual = $request->harga_jual;
        $barangs->harga_beli = $request->harga_beli;
        $barangs->laba = $barangs->harga_jual - $barangs->harga_beli;
        $barangs->status = $request->status;

        $barangs->save();
        $notifikasi = array(
            'pesan' => 'Barang berhasil diedit',
            'alert' => 'success',
        );
        return redirect('/barang')->with($notifikasi);
    }
    public function delete($id)
    {
        $barangs = Barang::find($id);
        $barangs->delete();
        $notifikasi = array(
            'pesan' => 'barang berhasil dihapus',
            'alert' => 'success',
        );
        return redirect('/barang')->with($notifikasi);
    }
}
