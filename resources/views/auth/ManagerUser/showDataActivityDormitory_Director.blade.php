@extends('layouts.appDormitory_Director')

@section('content')
<div class="wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>ข้อมูลกิจกรรมนักศึกษา
          </h1><br>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Dormitory_Director/home">หน้าหลัก</a></li>
            <li class="breadcrumb-item active"><a href="/Dormitory_Director/showDataActivity">กิจกรรมที่เข้าร่วม</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <table class="table table-striped table-light">
          <thead>
            <tr class="table-warning ">
              <th>ชื่อกิจกรรม</th>
              <th>คะแนนกิจกรรม</th>
              <th>ดำเนินการ</th>
            </tr>
          </thead>
          @foreach($joinActivity as $joinActivity)
          <tbody>
            <td>กิจกรรมต้อนรับน้องใหม่</td>
            <td>30</td>
            <td><a class="btn btn-info" href="/Dormitory_Director/manageActivity/activityDetail/">ดูรายละเอียด</a>
            </td>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-3 bg-warning">
            <a>จำนวนกิจกรรมทั้งหมด </a>
          </div>
          <div class="col-1 bg-light">
          </div>
          <div class="col-1 bg-light">
            <a>1 </a>
          </div>
          <div class="col-1 bg-warning">
            <a>กิจกรรม </a>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-3 bg-warning">
            <a>คะแนนทั้งหมด </a>
          </div>
          <div class="col-1 bg-light">
          </div>
          <div class="col-1 bg-light">
            <a>30 </a>
          </div>
          <div class="col-1 bg-warning">
            <a>คะแนน </a>
          </div>
    
        </div>
      </div>
    </div>
  </div>

</div>
@endsection