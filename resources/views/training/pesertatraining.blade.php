@extends('layout.master')

@section('content_lable')
<a href="/training/traininglist">Back</a>
@endsection

@section('urlCari')
/admin/init/role
@endsection
@section('content_footer')
    Content Foot
@endsection


@section('content_main')
    <div class="card-body table-responsive p-0">
            @if (session('sukses'))
                <div class="alert alert-primary" role="alert">
                    {{session('sukses')}}
                </div>
            @endif
            <div class="row text-nowrap">
                <div class="col-5" style="padding-left: 20px; padding-top: 5px;">
                <h3>Daftar Peserta Training [ {{$data_training->kode}} - {{$data_training->nama}} ]</h3>
                </div>
                <div class="col-6" style="padding-top: 5px;">
                    <button type="button" class="btn btn-primary btn-sm float-right"  
                            data-toggle="modal" data-target="#staticBackdrop">Tambah Peserta
                    </button>
                </div>
            </div>
                
                <table class="table table-hover text-nowrap">
                    <tr>
                    <th>User Id</th>
                    <th>Kode</th>
                    <th>Nilai</th>
                    <th>Atasan</th>
                    <th>Bawahan</th>
                    <th>Sejawat</th>
                    <th>Aksi</th>
                    
                </tr>
                @foreach ($data_pesertatraining as $training)
                <tr>              
                    <td>{{$training->user_id}}</td>
                    <td>{{$training->kode}}</td> 
                    <td>{{$training->nilai}}</td> 
                    <td>{{$training->atasan}}</td>  
                    <td>{{$training->bawahan}}</td>      
                    <td>{{$training->sejawat}}</td> 
                    <td><a href="/training/pesertatraining/{{$training->id}}/pesertatrainingedit" class="btn btn-sm btn-warning">edit</a>
                        <a href="/training/pesertatraining/{{$training->id}}/pesertatrainingdelete" class="btn btn-sm btn-danger" 
                            onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$data_pesertatraining->links()}}
        </div>



        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/training/pesertatrainingcreate" method="POST">
                        {{ csrf_field() }}
                        {{-- <div class="form-group">
                          <label for="nama_depan">Id</label>
                          <input type="text" name="kode" class="form-control" id="id" aria-describedby="emailHelp">
                        </div> --}}
                        <div class="form-group">
                          <label for="nama">User Id</label>
                          <input type="text" name="user_id" class="form-control" id="user_id">
                        </div>
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" name="kode" class="form-control" id="kode" value="{{$data_training->kode}}">
                          </div>


                        <div class="form-group">
                            <label for="nama">Nilai</label>
                            <input type="text" name="nilai" class="form-control" id="nilai">
                        </div>
                        <div class="form-group">
                            <label for="atasan">Atasan</label>
                            <input type="text" name="atasan" class="form-control" id="atasan">
                        </div>
                        <div class="form-group">
                            <label for="bawahan">Bawahan</label>
                            <input type="text" name="bawahan" class="form-control" id="bawahan">
                        </div>
                        <div class="form-group">
                            <label for="sejawat">Sejawat</label>
                            <input type="text" name="sejawat" class="form-control" id="sejawat">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')

@endsection