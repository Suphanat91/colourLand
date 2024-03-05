@extends('layouts.coffeetable')
@section('title')
    Home
@endsection
    @section('conutcomment')
            @foreach ($comments as $item)
                                                
                                            
                                        
            <span class="badge badge-danger badge-counter">{{ $item->count()}}</span>
            {{-- <li>{{ $item->comment }} - {{ $item->description }}</li> --}}
            {{-- <p>  items: {{ $count }}</p> --}}



            @endforeach
    @endsection


@section('alertcomment')
@foreach ($comments as $item)
<a class="dropdown-item d-flex align-items-center" href="#">
    <div class="mr-3">
        <div class="icon-circle bg-primary">
            <img src="{{ asset('storage/' . $item->user->profile_image) }}" alt="{{$item->user->profile_image}}" style="width: 40px; height: 40px; box-shadow: 0px 0px 10px #888888; border-radius: 10px; display: block; margin: auto;">
        </div>
    </div>
    <div>                         
        <div class="small text-gray-500">{{$item->created_at}}</div>
        <span class="font-weight-bold">{{$item->comment}}</span>
        
    </div>
</a>


@endforeach
@endsection

@section('countchat')
@foreach ( $chat as $itemq)
                                    
                                
{{-- <span class="badge badge-danger badge-counter">{{ $itemq->count()}}</span> --}}
<span class="badge badge-danger badge-counter">{{ $unreadMessagesCount }}</span>
@endforeach
@endsection


 @section('alertchat')
 
 @foreach ($chat as $i)
     
 
 <a class="dropdown-item d-flex align-items-center" href="/addreplymas/{{$i->idchat}}">
    <div class="dropdown-list-image mr-3">
        {{-- <img class="rounded-circle" src="img/undraw_profile_1.svg" alt="..."> --}}
        <img src="{{ asset('storage/' . $i->user->profile_image) }}" alt="{{$i->user->profile_image}}" style="width: 40px; height: 40px; box-shadow: 0px 0px 10px #888888; border-radius: 10px; display: block; margin: auto;">
        <div class="status-indicator bg-success"></div>
    </div>
    <div class="font-weight-bold">
        <div class="text-truncate">{{$i->masage}}</div>
        <div class="small text-gray-500">{{$i->created_at}}</div>
    </div>
</a>
@endforeach
<script src="{{asset('js/cottom.js')}}"></script>
 @endsection


 @section('content')
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800 ml-3">Dashboard</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
</div>
<div class="row ">
 <div class="col-xl-3 col-md-6 mb-4 ">
    <div class="card border-left-dark shadow h-100 py-2 ml-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                        จำนวนผู้ใช้งาน</div>

                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userCount }}</div>
                </div>
                <div class="col-auto">
                    <i class="bi bi-people fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        คำสั่งซื้อ</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countorderlist}}</div>
                </div>
                <div class="col-auto">
                    <i class="bi bi-bag-heart fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        จัดการเเล้ว</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countorderlist2}}</div>
                </div>
                <div class="col-auto">
                    <i class="bi bi-bag-heart fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        ส่งสำเร็จเเล้ว</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countorderlist1}}</div>
                </div>
                <div class="col-auto">
                    <i class="bi bi-bag-heart fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<div class="row">
<!-- Area Chart -->
<div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">จำนวนดอกไม้ที่ขายได้ในแต่ละเดือน</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                    aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
            </div>
        </div>
    </div>
</div>
<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">อัตราส่วนการผลิต</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                    aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
            </div>
            <div class="mt-4 text-center small">
                <span class="mr-2">
                    <i class="fas fa-circle text-primary"></i> คำสั่งซื้อ
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-success"></i> คำสั่งที่จัดการเเล้ว
                </span>
                <span class="mr-2">
                    <i class="fas fa-circle text-info"></i> คำสั่งซื้อที่ส่งเเล้ว
                </span>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
    <div class="col-lg-6 mb-4">

        <!-- Project Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
            </div>
            <div class="card-body">
                <h4 class="small font-weight-bold">Server Migration <span
                        class="float-right">20%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                        aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Sales Tracking <span
                        class="float-right">40%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                        aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Customer Database <span
                        class="float-right">60%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%"
                        aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Payout Details <span
                        class="float-right">80%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                        aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <h4 class="small font-weight-bold">Account Setup <span
                        class="float-right">Complete!</span></h4>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <!-- Color System -->
        {{-- <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body">
                        Primary
                        <div class="text-white-50 small">#4e73df</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-success text-white shadow">
                    <div class="card-body">
                        Success
                        <div class="text-white-50 small">#1cc88a</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-info text-white shadow">
                    <div class="card-body">
                        Info
                        <div class="text-white-50 small">#36b9cc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body">
                        Warning
                        <div class="text-white-50 small">#f6c23e</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body">
                        Danger
                        <div class="text-white-50 small">#e74a3b</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-secondary text-white shadow">
                    <div class="card-body">
                        Secondary
                        <div class="text-white-50 small">#858796</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-light text-black shadow">
                    <div class="card-body">
                        Light
                        <div class="text-black-50 small">#f8f9fc</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="card bg-dark text-white shadow">
                    <div class="card-body">
                        Dark
                        <div class="text-white-50 small">#5a5c69</div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
</div>

 @endsection
