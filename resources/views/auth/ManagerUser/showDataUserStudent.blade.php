@extends('layouts.appStudent')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>ข้อมูลนักศึกษา
                </h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/Student/home">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active"><a href="/Student/showDataUser">ข้อมูลนักศึกษา</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>ชื่อ </a>
                </div>
                <div class="col-9 bg-light">
                    <a>
                        {{ Auth::user()->name }}
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>รหัสนักศึกษา </a>
                </div>
                <div class="col-9 bg-light">
                    <a>
                        {{ Auth::user()->id }}
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>คณะ</a>
                </div>
                <div class="col-9 bg-light">
                    <a>
                        {{ Auth::user()->student_faculty }}
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>เบอร์โทร</a>
                </div>
                <div class="col-9 bg-light">
                    <a>
                        {{ Auth::user()->tel }}
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>จำนวนกิจกรรมที่เข้าร่วม</a>
                </div>
                <div class="col-9 bg-light">
                    <a>
                        10
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>คะแนนกิจกรรม</a>
                </div>
                <div class="col-9 bg-light">
                    <a>
                        5
                    </a>
                </div>
            </div>
            <br>
        </div>
    </div>
    <br>

    <div class="row mb-2">
        <div class="col-sm-6">
            <h5>ประวัติหอพัก
            </h5><br>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>ปีการศึกษา</a>
                </div>
                <div class="col-3 bg-warning">
                    <a>
                        หมายเลขห้อง
                    </a>
                </div>
                <div class="col-3 bg-warning">
                    <a>
                        หอพักนักศึกษา
                    </a>
                </div>
                <div class="col-3 bg-warning">
                    <a>
                        หน่วยบริการหอพักนักศึกษา
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @foreach($data as $data)
            <div class="row">
                <div class="col-3 bg-light">
                    <a>{{$data->semester}}

                    </a>
                </div>
                <div class="col-3 bg-light">
                    <a>
                        {{$data->room}}
                    </a>
                </div>
                <div class="col-3 bg-light">
                    <a>
                        {{$data->dorm}}
                    </a>
                </div>
                <div class="col-3 bg-light">
                    <a>
                        {{$data->dorm_service}}
                    </a>
                </div>
            </div>
            @endforeach
            <br>
        </div>
    </div>
</div>
@endsection