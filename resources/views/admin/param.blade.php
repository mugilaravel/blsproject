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
                    <h3>Daftar Parameter</h3>
                </div>
                <div class="col-6" style="padding-top: 5px;">
                    <button type="button" class="btn btn-primary btn-sm float-right"  
                            data-toggle="modal" data-target="#staticBackdrop">Tambah Data
                    </button>
                </div>
            </div>
                
                <table class="table table-hover text-nowrap">
                    <tr>
                    <th>Param_key</th>
                    <th>Param_Value</th>
                    <th>Param_Desc</th>
                    <th>Param_Status</th>
                    <th>Param_Seq</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($data_param as $param)
                <tr>              
                    <td>{{$param->param_key}}</td>
                    <td>{{$param->param_value}}</td> 
                    <td>{{$param->param_desc}}</td>  
                    <td>{{$param->param_status}}</td>  
                    <td>{{$param->param_seq}}</td>     
                    <td><a href="/admin/param/{{$param->id}}/paramedit" class="btn btn-sm btn-warning">edit</a>
                        <a href="/admin/param/{{$param->id}}/paramdelete" class="btn btn-sm btn-danger" 
                            onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$data_param->links()}}
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
                    <form action="/admin/paramcreate" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="kode">Param Key</label>
                          <input type="text" name="param_key" class="form-control" id="param_key">
                        </div>
                        <div class="form-group">
                            <label for="param_value">Param Value</label>
                            <input type="text" name="param_value" class="form-control" id="param_value">
                        </div>
                        <div class="form-group">
                            <label for="param_desc">Param Desc</label>
                            <input type="text" name="param_desc" class="form-control" id="param_desc">
                        </div>
                        <div class="form-group">
                            <label for="param_status">Param Status</label>
                            <input type="text" name="param_status" class="form-control" id="param_status">
                        </div>
                        <div class="form-group">
                            <label for="param_seq">Param Seq</label>
                            <input type="text" name="param_seq" class="form-control" id="param_seq">
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