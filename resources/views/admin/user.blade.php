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
                    <button type="button" class="btn btn-primary btn-sm float-right"  
                            data-toggle="modal" data-target="#staticBackdrop">Tambah Data
                    </button>
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
                            <label for="email">Role</label>
                            <input type="text" name="role" class="form-control" id="role">
                        </div>

                        <div class="form-group">
                            <label for="divisi">Divisi</label>
                            <input type="text" name="divisi_kode" class="form-control" id="divisi_kode">
                        </div>
                        <div class="form-group">
                            <label for="departemen_kode">Departemen</label>
                            <input type="text" name="departemen_kode" class="form-control" id="departemen_kode">
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