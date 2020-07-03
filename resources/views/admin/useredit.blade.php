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
                        <label for="jenis">Role</label>
                        <select name="jenis" class="form-control" id="jenis">
                            @foreach ($data_role as $jenis)
                                <option value={{$jenis->param_value}} @if ($user->role == $jenis->param_value) selected @endif>{{$jenis->param_desc}}</option>
                            @endforeach
                        </select>  
                    </div>
                      <div class="form-group">
                        <label for="divisi">Divisi</label>
                        <select name="divisi_kode" class="form-control" id="divisi_kode">
                            <option value="">Divisi</option>
                            @foreach ($data_divisi as $divisi)
                            <option value={{$divisi->kode}} @if ($divisi->kode == $user->divisi_kode) selected @endif>{{$divisi->nama}}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="departemen">Departemen</label>
                        <select name="departemen_kode" class="form-control" id="departemen_kode">
                            <option value="">Departemen</option>
                            @foreach ($data_departemen as $departemen)
                            <option value={{$departemen->kode}} @if ($departemen->kode == $user->departemen_kode) selected @endif>{{$departemen->nama}}</option>
                            @endforeach
                        </select>       
                    </div>

                      <div class="modal-footer">
                          <a href="{{ url()->previous() }}" class="btn btn-sm btn-warning">Batal</a>
                          <button type="submit" class="btn btn-sm btn-warning float-left">Update</button>
                      </div> 
                </form>
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