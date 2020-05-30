@extends('layout.master');

@section('content_lable')
    
@endsection

@section('content_footer')
    Content Footer
@endsection

@section('content_main')
             @if (session('sukses'))
                <div class="alert alert-primary" role="alert">
                    {{session('sukses')}}
                </div>
            @endif
            <h3>Edit Data User</h3>
            <div class="row">
                <div class="col-lg-12">
                <form action="/admin/user/{{$user->id}}/userupdate" method="POST" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="user_id">User Id</label>
                        <input type="text" name="user_id" class="form-control" id="user_id" value="{{$user->user_id}}">
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama User</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                      </div>
                      <div class="form-group">
                          <label for="email">email</label>
                          <input type="text" name="email" class="form-control" id="email" value="{{$user->email}}">
                      </div>
                      <div class="form-group">
                          <label for="email">Role</label>
                          <input type="text" name="role" class="form-control" id="role" value="{{$user->role}}">
                      </div>
                      <div class="form-group">
                        <label for="divisi_kode">Divisi</label>
                        <input type="text" name="divisi_kode" class="form-control" id="divisi" value="{{$user->divisi->kode}}">
                      </div>
                      <div class="form-group">
                        <label for="departemen_kode">Departemen</label>
                        <input type="text" name="departemen_kode" class="form-control" id="departemen_kode" value="{{$user->departemen->kode}}">
                      </div>

                      <div class="modal-footer">
                          <a href="{{ url()->previous() }}" class="btn btn-sm btn-warning">Batal</a>
                          <button type="submit" class="btn btn-sm btn-warning float-left">Update</button>
                      </div> 
                </form>
            </div>
            </div>
            </div
  @endsection