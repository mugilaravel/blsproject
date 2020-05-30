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
                    <h3>Daftar Departemen</h3>
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
                    <th>Nama Deparetmen</th>
                    <th>Nik Kadept</th>
                    <th>Nama Kadept</th>
                    <th>Kode Divisi</th>
                    <th>Aksi</th>
                    
                </tr>
                @foreach ($data_departemen as $departemen)
                <tr>              
                    <td>{{$departemen->kode}}</td>
                    <td>{{$departemen->nama}}</td> 
                    <td>{{$departemen->nik_kadept}}</td>  
                    <td>{{$departemen->nama_kadept}}</td>    
                    <td>{{$departemen->divisi->nama}}</td>   
                    <td><a href="/admin/departemen/{{$departemen->id}}/departemenedit" class="btn btn-sm btn-warning">edit</a>
                        <a href="/admin/departemen/{{$departemen->id}}/departemendelete" class="btn btn-sm btn-danger" 
                            onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$data_departemen->links()}}
        </div>



        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input departemen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/admin/departemencreate" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="kode">Kode Departemen</label>
                          <input type="text" name="kode" class="form-control" id="kode">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Departemen</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="nik_kadept">NIK Kadept</label>
                            <input type="text" name="nik_kadept" class="form-control" id="nik_kadept">
                        </div>
                        <div class="form-group">
                            <label for="nama_kadept">Nama Kadept</label>
                            <input type="text" name="nama_kadept" class="form-control" id="nama_kadept">
                        </div>
                        <div class="form-group">
                            {{-- <label for="divisi_kode">Kode Divisi</label>
                            <input type="text" name="divisi_kode" class="form-control" id="divisi_kode"> --}}
                            <select name="divisi_kode" class="form-control">
                                <option value="">Divisi</option>
                                @foreach ($data_divisi as $divisi)
                                <option value={{$divisi->kode}}>{{$divisi->nama}}</option>
                                @endforeach
                                {{-- <option value="L" @if ($siswa ->jenis_kelamin == 'L') selected @endif>Laki Laki</option>
                                <option value="P" @if ($siswa ->jenis_kelamin == 'P') selected @endif>Perempuan</option> --}}
                              </select>
                        
                        
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