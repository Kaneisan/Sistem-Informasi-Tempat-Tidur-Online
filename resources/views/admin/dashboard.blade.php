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

    <div class="row">
    
    <div class="col-sm">
    @foreach($kamar as $kmr)
        <div class="card" style="border-radius: 5px; margin-top:10px" >
            <div class="card-header" style="background-color: #DFDFDE;">
                Ruang No {{$kmr->id_ruang}}
            </div>
            <div class="card-body" style="background-color: #F1DDBF;">
                <div class="row">
                    <div class="col-sm-8">
                    <h5 class="card-title">{{$kmr->nama_ruang}} ({{$kmr->kelas_perawatan}})</h5>
                <a class="card-link">Last Update : {{$kmr->updated_at}}</a>
                    </div>
                    <div class="col-sm-2" style="background-color: #C0EDA6; text-align:center; padding: 15px 0px">
                        <p class="card-text">Total Kamar : {{$kmr->total_kamar}}</p>
                    </div>
                    <div class="col-sm-2" style="background-color: #FFA8A8; text-align:center; padding: 15px 0px">
                        <p class="card-text">Kamar Kosong : {{$kmr->sisa_kamar}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</div>



@endsection