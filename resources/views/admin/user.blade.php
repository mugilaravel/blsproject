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
                    <h3>Daftar User</h3>
                </div>
                <div class="col-6" style="padding-top: 5px;">
                    <a href="/admin/user/export" class="btn btn-sm btn-primary float-right">Export Excel</a>
                    <a href="/admin/user/exportpdf" class="btn btn-sm btn-primary float-right">Export Pdf</a>
                    <button type="button" class="btn btn-primary btn-sm float-right"  
                            data-toggle="modal" data-target="#staticBackdrop">Tambah Data
                    </button>&nbsp;
                </div>
            </div>
                
                <table class="table table-hover text-nowrap">
                    <tr>
                    <th>Id</th>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Divisi</th>
                    <th>Departemen</th>
                    <th>Aksi</th>
                    
                </tr>
                @foreach ($data_user as $user)
                <tr>              
                    <td>{{$user->id}}</td>
                    <td>{{$user->user_id}}</td>
                    <td>{{$user->name}}</td> 
                    <td>{{$user->email}}</td>  
                    <td>{{$user->role}}</td>    
                    <td>{{$user->divisi->nama}}</td> 
                    <td>{{$user->departemen->nama}}</td>   
                    
                    <td><a href="/admin/user/{{$user->id}}/useredit" class="btn btn-sm btn-warning">edit</a>
                        <a href="/admin/user/{{$user->id}}/userdelete" class="btn btn-sm btn-danger" 
                            onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$data_user->links()}}
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
                    <form action="/admin/createuser" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <label for="nama_depan">User Id</label>
                          <input type="text" name="user_id" class="form-control" id="user_id" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="nama">Nama User</label>
                          <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Role</label>
                            <select name="jenis" class="form-control" id="jenis">
                                <option value="">Role</option>
                                @foreach ($data_role as $role)
                                <option value={{$role->param_value}}>{{$role->param_desc}}</option>
                                @endforeach
                            </select>  
                        </div>

                        <div class="form-group">
                            <label for="divisi">Divisi</label>
                            <select name="divisi_kode" class="form-control" id="divisi_kode">
                                <option value="">Divisi</option>
                                @foreach ($data_divisi as $divisi)
                                <option value={{$divisi->kode}}>{{$divisi->nama}}</option>
                                @endforeach
                            </select>                        
                        </div>
                        <div class="form-group">
                            <label for="departemen">Departemen</label>
                            <select name="departemen_kode" class="form-control" id="departemen_kode">
                                <option value="">Departemen</option>
                                @foreach ($data_departemen as $departemen)
                                <option value={{$departemen->kode}}>{{$departemen->nama}}</option>
                                @endforeach
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
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="divisi_kode"]').on('change', function() {
            var divisi_kode = $(this).val();
            // alert('tes....................'+divisi_kode);
            if(divisi_kode) {
                $.ajax({
                    url: '/admin/departemen/'+divisi_kode+'/departemenbydivisi',
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="departemen_kode"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="departemen_kode"]').append('<option value="'+ value.kode +'">'+ value.nama +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="departemen_kode"]').empty();
            }
        });


        $('input[name="pic_nik"]').on('change', function() {
            var nik = $(this).val();
            if(nik) {
                $.ajax({
                    url: '/admin/user/'+nik+'/findbyid',
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        if(data){
                            $('#nama_pic').val(data.name);
                        }else{
                            $('#nama_pic').val("");
                        }
                    }
                });
            }else{
                $('#nama_pic').val("");
            }
        });



    });
</script>
@endsection