@extends('admin.layouts.main')
@section('konten')
<div class="card shadow mb-2">
    <div class="card-header py-3">
        <p class="m-0 pt-1 font-weight-bold text-primary">
            Tabel Data Pelanggan Service
        </p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Nama/Type</th>
                        <th>Keluhan</th>
                        <th>Kelengkapan</th>
                        <th>Hasil Service</th>
                        <th>Ongkos</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Pelayanan as $p)
                    <td class="align-middle">{{$loop->iteration}}</td>
                    <td class="align-middle">{{$p->created_at->format("d-m-y")}}</td>
                    <td class="align-middle">{{$p->name}}</td>
                    <td class="align-middle">{{$p->type}}</td>
                    <td class="align-middle">{{$p->keluhan}}</td>
                    <td class="align-middle">{{$p->kelengkapan}}</td>
                    <td class="align-middle">{{$p->hasil}}</td>
                    <td class="align-middle">Rp.{{number_format($p->biaya,0)}}</td>
                    <td class="align-middle">
                        @if($p->status_kirim=='N')
                        <span class="text-danger"><b>Belum Dikirim</b></span>
                        @else
                        <span class="text-success"><b>Dikirim</b></span>
                        @endif
                    </td>
                    <td>
                        <div class="btn-group-vertical">
                            <center>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <form action="/notifikasi" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id_pelayanan" value="{{$p->id_pelayanan}}">
                                            <input type="hidden" name="name" value="{{$p->name}}">
                                            <input type="hidden" name="type" value="{{$p->type}}">
                                            <input type="hidden" name="nomor" value="{{$p->nomor}}">
                                            <input type="hidden" name="status_kirim" value="Y">
                                            <button class="dropdown-item" type="submit"><i class="fas fa-comment"></i> Kirim Notifikasi</button>
                                        </form>
                                        <button href="notifikasi/update/{{$p->id_pelayanan}}" id="btn-edit-ongkos" data-id_pelayanan="{{$p->id_pelayanan}}" data-biaya="{{$p->biaya}}" class="dropdown-item" type="button" data-toggle="modal" data-target="#tambahuser"><i class="fas fa-money-bill-wave"></i> Tambah Ongkos</button>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Tambah Data -->
<div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold " id="exampleModalLongTitle"><i class="fas fa-money-bill-wave"> </i> Tambah Ongkos Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid px-4">
                    <form action="/notifikasi/update" method="POST" enctype="multipart/form-data" class="mr-8">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" class="form-control" name="id_pelayanan" id="edit-id_pelayanan"><br>
                            <label for="biaya" class="col-sm-2 col-form-label">Ongkos</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" required="required" name="biaya" id="edit-biaya">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-purple">Simpan</button>
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection