@extends('layout.master')

@section('content_lable')
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
                <h3>Training List </h3>
                </div>
                <div class="col-6" style="padding-top: 5px;">
                    {{-- <button type="button" class="btn btn-primary btn-sm float-right"  
                            data-toggle="modal" data-target="#staticBackdrop">Tambah Data
                    </button> --}}
                </div>
            </div>
                
                <table class="table table-hover text-nowrap">
                    <tr>
                    <th>Kode</th>
                    <th>Nama Training</th>
                    <th>Program</th>
                    <th>Skill</th>
                    <th>Mulai</th>
                    <th>Akhir</th>
                    <th>Aksi</th>
                    
                </tr>
                @foreach ($data_training as $training)
                <tr>              
                    <td>{{$training->kode}}</td>
                    <td>{{$training->nama}}</td> 
                    <td>{{$training->program}}</td>  
                    <td>{{$training->skill}}</td>      
                    <td>{{$training->tgl_mulai}}</td> 
                    <td>{{$training->tgl_akhir}}</td> 
                    <td>
                        {{-- <a href="/training/training/{{$training->id}}/trainingedit" class="btn btn-sm btn-warning">edit</a> --}}
                        <a href="/training/pesertatraining/{{$training->kode}}" class="btn btn-sm btn-warning">Detail</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$data_training->links()}}
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
                    <form action="/training/trainingcreate" method="POST">
                        {{ csrf_field() }}
                        {{-- <div class="form-group">
                          <label for="nama_depan">Id</label>
                          <input type="text" name="kode" class="form-control" id="id" aria-describedby="emailHelp">
                        </div> --}}
                        <div class="form-group">
                          <label for="nama">Kode Training</label>
                          <input type="text" name="kode" class="form-control" id="kode">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Training</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="program">Program</label>
                            <input type="text" name="program" class="form-control" id="program">
                        </div>
                        <div class="form-group">
                            <label for="skill">Skill</label>
                            <input type="text" name="skill" class="form-control" id="skill">
                        </div>
                        <div class="form-group">
                            <label for="Mulai">Tgl Mulai</label>
                            <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai">
                        </div>
                        <div class="form-group">
                            <label for="tgl_akhir">Tgl Akhir</label>
                            <input type="date" name="tgl_akhir" class="form-control" id="tgl_akhir">
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