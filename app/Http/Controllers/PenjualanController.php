<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Laporanpenjualan;

class PenjualanController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        $penjualans = Penjualan::all();
        $detailPenjualan = DetailPenjualan::orderBy('id_detail_penjualan', 'desc')->take(1)->get();
        $count = \DB::table('penjualans')->sum('subtotal');
        return view(
            'admin.penjualan.Mpenjualan',
            [
                'tittle' => 'Penjualan',
                'Barang' => $barangs,
                'Penjualan' => $penjualans,
                'count' => $count,
                'detailPenjualan' => $detailPenjualan
            ]
        );
    }
    public function getBarangId($id)
    {
        $data = Barang::where('code', '=', $id)
            ->first();
        return response()->json($data);
    }
    public function create(Request $request)
    {
        Penjualan::create([
            'id_barang' => $request->code,
            'code' => $request->id_barang,
            'name' => $request->name,
            'merk' => $request->merk,
            'harga' => $harga = $request->harga,
            'qty' => $qty = $request->qty,
            'subtotal' => $harga * $qty,
        ]);

        $barangs = Barang::find($request->code);
        $barangs->stock -= $qty;
        $barangs->update();

        return redirect('/penjualan');
    }
    public function delete($id_penjualan)
    {
        $penjualans = Penjualan::find($id_penjualan);
        $detail = Penjualan::where('id_penjualan', $penjualans->id_penjualan)->get();
        foreach ($detail as $item) {
            $barangs = Barang::find($item->id_barang);
            if ($barangs) {
                $barangs->stock += $item->qty;
                $barangs->update();
            }
            $item->delete();
        }
        return redirect('/penjualan');
    }

    public function simpan(Request $request)
    {
        $detail_penjualan=DetailPenjualan::create([
            'subtotal' => $request->dibayar,
            'diterima' => $request->diterima,
            'kembali' => $request->kembali
        ]);
        $penjualan=Penjualan::whereNull("id_transaksi");
        $penjualan_data=$penjualan->get();
        // $laporan=Laporan::whereDate("created_at", date('Y-m-d')
        // );
        // dd($penjualan_data);
        foreach($penjualan_data as $l){
            $laporan=Laporanpenjualan::whereDate("created_at", date('Y-m-d'))->updateOrCreate([
                'id_barang'=>$l->id_barang,
            ],
            [
                'total_penjualan'=>\DB::raw("total_penjualan + $l->subtotal"),
                'banyak_penjualan'=>\DB::raw("banyak_penjualan + $l->qty"),
                'pendapatan'=>\DB::raw("total_penjualan - total_pembelian"),
            ]
        );
        }
        $penjualan->update([
            'id_transaksi'=>$detail_penjualan->id_detail_penjualan,
        ]);
        return redirect('/penjualan');
    }
    public function clear()
    {
        $detailPenjualan = DetailPenjualan::orderBy('id_detail_penjualan', 'desc')->take(1)->first();
        $detailPenjualan->simpan = 'Y';
        $detailPenjualan->update();

        Penjualan::truncate();
        return redirect('/penjualan');
    }
    public function nota($id_detail_penjualan)
    {
        $detailPenjualan = DetailPenjualan::orderBy('id_detail_penjualan', 'desc')->take(1)->get();
        $penjualans = Penjualan::all();
        $countTotal = \DB::table('penjualans')->sum('subtotal');
        $tanggal = date('d-M-Y');

        return view(
            'admin.nota.notaPenjualan',
            [
                'id' => $id_detail_penjualan,
                'title' => 'Nota Penjualan',
                'Penjualan' => $penjualans,
                'countTotal' => $countTotal,
                'tanggal' => $tanggal,
                'detailPenjualan' => $detailPenjualan
            ]
        );
    }
}
