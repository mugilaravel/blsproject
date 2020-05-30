@extends('layout.master')

@section('content_lable')
@endsection

@section('urlCari')
{{-- /admin/init/role --}}
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
                    <h3>Daftar Divisi</h3>
                </div>
                <div class="col-6" style="padding-top: 5px;">
                    <button type="button" class="btn btn-primary btn-sm float-right"  
                            data-toggle="modal" data-target="#staticBackdrop">Tambah Data
                    </button>
                </div>
            </div>
                
                <table class="table table-hover text-nowrap">
                    <tr>
                    <th>Kode</th>
                    <th>Nama Divisi</th>
                    <th>Nik Kadiv</th>
                    <th>Nama Kadiv</th>
                    <th>Aksi</th>
                    
                </tr>
                @foreach ($data_divisi as $divisi)
                <tr>              
                    <td>{{$divisi->kode}}</td>
                    <td>{{$divisi->nama}}</td> 
                    <td>{{$divisi->nik_kadiv}}</td>  
                    <td>{{$divisi->nama_kadiv}}</td>      
                    <td><a href="/admin/divisi/{{$divisi->id}}/divisiedit" class="btn btn-sm btn-warning">edit</a>
                        <a href="/admin/divisi/{{$divisi->id}}/divisidelete" class="btn btn-sm btn-danger" 
                            onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$data_divisi->links()}}
        </div>



        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input Divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/divisicreate" method="POST">
                        {{ csrf_field() }}
                        {{-- <div class="form-group">
                          <label for="nama_depan">Id</label>
                          <input type="text" name="kode" class="form-control" id="id" aria-describedby="emailHelp">
                        </div> --}}
                        <div class="form-group">
                          <label for="kode">Kode Divisi</label>
                          <input type="text" name="kode" class="form-control" id="kode">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Divisi</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="nik_kadiv">NIK Kadiv</label>
                            <input type="text" name="nik_kadiv" class="form-control" id="nik_kadiv">
                        </div>
                        <div class="form-group">
                            <label for="nama_kadiv">Nama Kadiv</label>
                            <input type="text" name="nama_kadiv" class="form-control" id="nama_kadiv">
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