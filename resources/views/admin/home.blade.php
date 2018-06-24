@extends('admin.layout.master')
@section('content2')
<!-- Main content -->
<div class="content-wrapper">
  <!-- Page header -->
  <div class="page-header page-header-default">
    <div class="page-header-content">
      <div class="page-title">
        <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Trang Quản Lý</h4>
      </div>
    </div>

    <div class="breadcrumb-line">
      <ul class="breadcrumb">
        <li><i class="icon-home2 position-left"></i> Trang chủ</li>

      </ul>
    </div>
  </div>
  <!-- /page header -->
  <div class="content">
    <div class="row">
      <div class="col-12">
        <div class="panel panel-flat">
          <div class="panel-body">
            Chào mừng bạn đến với Trang quản trị website tuyển dụng việc làm
          </div>
        </div>
      </div>
    </div>
    <!-- Quick stats boxes -->
    <div class="row">
      <div class="col-lg-4">

        <!-- Members online -->
        <div class="panel bg-teal-400">
          <div class="panel-body">
            <h3 class="no-margin">{{ $timviec }}</h3>
            Ứng viên           
          </div>
          <div class="container-fluid">
            <div id="members-online"></div>
          </div>
        </div>
        <!-- /members online -->

      </div>

      <div class="col-lg-4">

        <!-- Motelroom -->
        <div class="panel bg-pink-400">
          <div class="panel-body">
            <h3 class="no-margin">{{ $tuyendung }}</h3>
            Nhà tuyển dụng            
          </div>

          <div id="server-load"></div>
        </div>
        <!-- /current server load -->

      </div>

      <div class="col-lg-4">
        <!-- Today's report -->
        <a href="admin/thongke">
          <div class="panel bg-blue-400">
            <div class="panel-body">
              <h3 class="no-margin">{{ $job }}</h3>
              Công việc              
            </div>
            <div id="today-revenue"></div>
          </div>
        </a>
        <!-- /today's revenue -->
      </div>

      <div class="col-lg-4">

        <!-- Motelroom -->
        <div class="panel bg-pink-400">
          <div class="panel-body">
            <h3 class="no-margin">{{ $cv }}</h3>
            Hồ sơ được tạo            
          </div>

          <div id="server-load"></div>
        </div>
        <!-- /current server load -->

      </div>
       <div class="col-lg-4">
        <!-- Today's report -->
        <a href="admin/thongke">
          <div class="panel bg-blue-400">
            <div class="panel-body">
              <h3 class="no-margin">{{ $ungtuyen }}</h3>
              Lượt ứng tuyển              
            </div>
            <div id="today-revenue"></div>
          </div>
        </a>
        <!-- /today's revenue -->
      </div>
    </div>
    <!-- /quick stats boxes -->
    <!-- Footer -->
    
    <!-- /footer -->
  </div>
</div>
@endsection