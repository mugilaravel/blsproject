@extends('layout.master')

@section('content_lable')
@endsection

@section('urlCari')
/admin/init/role
@endsection
@section('content_footer')
    Content Footer
@endsection

@section('content_main')
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>150</h3>
          <p>New Orders</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>
          <p>Bounce Rate</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>44</h3>

          <p>User Registrations</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  
  {{-- 
  <div class="panel" id="chartDivisi">
  </div>

  <div class="panel" id="chartKanwil">
  </div>

    <div class="panel" id="chartTest2">
    <table>
      @foreach ($data_training as $item)
      <tr>
        <td>{{$item->divisi_kanwil}} </td>
        <td>{{$item->Module_Name}}  </td>
        <td>{{$item->jum_peg_not_start}} </td>
        <td>{{$item->jum_peg_inprogress}}  </td>
        <td>{{$item->jum_peg_complete}}  </td>
      </tr>     
      @endforeach
    </table>
   
    
  </div> --}}

  
@endsection
