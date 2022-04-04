@extends('admin.layouts.main')
@section('konten')
<div class="row">
    <div class="col mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Banyak Kamar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countKamar}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-bed fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Banyak User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countUser}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-person"></i>
                        <!-- <i class="fa-solid fa-user fa-2x text-gray-300"></i> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($kamar as $kmr)
<div class="row">
    <div class="col-sm">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$kmr->nama_ruang}}</h5>
                <p class="card-text">Total Kamar : {{$kmr->total_kamar}}</p>
                <p class="card-text">Kamar Kosong : {{$kmr->sisa_kamar}}</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection