@extends('admin.layouts.main')
@section('konten')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <p class="m-0 pt-1 font-weight-bold text-primary">
            Form Request Bahan Service
        </p>
    </div>
    <div class="card-body">
        <form action="/request/create" method="POST" enctype="multipart/form-data" class="mr-8">
            @csrf
            <div class="form-group">
                <label for="codeservice">Barang yang sedang Diservice</label>
                <div class="row">
                    <div class="col">
                        <select name="barang_service">
                            <option selected>Pilih Barang Yang Sedang Diservice</option>
                            @foreach($Pelayanan as $p)
                            <option value="{{$p->type}}">{{$p->type}}</option>
                            @endforeach
                        </select>
                        <!-- <input type="text" class="form-control" name="search_box" id="search_box" onkeyup="javascript:load_data(this.load)"> -->
                    </div>
                    <div cla ss="col">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="codeservice">Barang Request</label>
                <div class="row">
                    <div class="col">
                        <select name="barang_req">
                            <option selected>Pilih Barang Yang Direquest</option>
                            @foreach($Barang as $b)
                            <option value="{{$b->name}}">{{$b->name}}</option>
                            @endforeach
                            <option value="lainnya">Lainnya</option>
                        </select>
                        <p><em>*Jika tidak ada dalam daftar, masukkan nama barang baru</em></p>
                        <input type="text" class="form-control" name="barang_req_baru">
                    </div>
                    <div cla ss="col">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="nama">Banyak barang request</label>
                <input type="text" class="form-control" name="banyak_req">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<!-- End Modal Tambah Item -->
<div class="modal fade bd-example-modal-lg" id="pilihBarang1" tabindex="-1" aria-labelledby="modal2" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal2"><i class="fas fa-box-open text-primary"></i> Pilih Barang Untuk Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card mb-4 mt-2">
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Code</th>
                                    <th>Nama</th>
                                    <th>Merk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Barang as $barang)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$barang->code}}</td>
                                    <td>{{$barang->name}}</td>
                                    <td>{{$barang->merk}}</td>
                                    <td>{{$barang->harga_jual}}</td>
                                    <td>{{$barang->stock}}</td>
                                    <td>{{$barang->status}}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" id="pilih" data-dismiss="modal" aria-label="Close" data-id_barang="{{$barang->id_barang}}" data-code="{{$barang->code}}" data-name="{{$barang->name}}" data-merk="{{$barang->merk}}" data-harga_jual="{{$barang->harga_jual}}" data-stock="{{$barang->stock}}" data-status="{{$barang->status}}">
                                            <i class="far fa-check-circle"></i> Pilih</button>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Pilih -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Barang Belum Di Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Nama/Type</th>
                                <th>Keluhan</th>
                                <th>Pilih</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Pelayanan as $p)
                            <td class="align-middle">{{$loop->iteration}}</td>
                            <td class="align-middle">{{$p->created_at->format("d-m-y")}}</td>
                            <td class="align-middle">{{$p->name}}</td>
                            <td class="align-middle">{{$p->type}}</td>
                            <td class="align-middle">{{$p->keluhan}}</td>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection