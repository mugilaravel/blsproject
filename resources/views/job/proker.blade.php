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


{{-- <div class="form-group">
    <label for="descripsi">Desc</label>
    <input type="text" name="descripsi" class="form-control" id="descripsi">
</div> --}}

<form  action="/job/proker">
    {{-- <div class="input-group input-group-sm"> --}}
      {{-- <input class="form-control form-control-navbar" type="search" name="cari" 
      placeholder="Cari" aria-label="CARI"/> --}}
      
      <div class="row">
            <div class="form col-md-4">
                <label for="nama">Nama Proker</label>
                <input type="text" name="prokercari" class="form-control" id="prokercari"
                value="{{$prokercari}}"
                >
            </div>
            <div class="form-group col-md-4">
                <label for="tahun">Tahun</label>
                <select name="tahuncari" class="form-control" id="tahuncari">
                    <option value="">--Tahun--</option>
                    @foreach ($data_tahun as $tahun)
                        {{-- <option value={{$tahun->param_value}}>{{$tahun->param_desc}}</option> --}}
                        {{-- value="{{$tahuncari}}" --}}
                        <option value={{$tahun->param_value}} @if ($tahuncari == $tahun->param_value) selected @endif>{{$tahun->param_desc}}</option>
                    @endforeach
                </select>     
            </div>
            <div class="form-group col-md-1">
                <label for="tahun">Action</label>
                <button type="submit" class="form-control btn btn-primary btn-sm float-right"  
                       data-target="#staticBackdrop">Cari
                </button>
            </div>
        <div class="col-md-2" style="padding-top: 5px;">
        </div>
    </div>
</form>


    <div class="card-body table-responsive p-0">
            @if (session('sukses'))
                <div class="alert alert-primary" role="alert">
                    {{session('sukses')}}
                </div>
            @endif
            <div class="row text-nowrap">
                <div class="col-5" style="padding-left: 20px; padding-top: 5px;">
                    <h3>Daftar Proker</h3>
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
                    <th>Nama Proker</th>
                    {{-- <th>Descripsi</th> --}}
                    {{-- <th>Jenis</th> --}}
                    <th>Departemen</th>
                    <th>Divisi</th>
                    {{-- <th>PIC</th> --}}
                    <th>Status</th>
                    {{-- <th>Mulai</th> --}}
                    {{-- <th>Selesai</th> --}}
                    <th>Tahun</th>
                    <th>Aksi</th>
                    
                </tr>
                @foreach ($data_proker as $proker)
                <tr>              
                    <td>{{$proker->kode}}</td>
                    <td>{{$proker->nama}}</td> 
                    {{-- <td>{{$proker->descripsi}}</td>   --}}
                    {{-- <td>{{$proker->jenis}}</td>   --}}
                    <td>{{$proker->departemen->nama}}</td>  
                    <td>{{$proker->divisi->nama}}</td>  
                    {{-- <td>{{$proker->pic_nik}}</td>   --}}
                    <td>{{$proker->status}}</td>  
                    {{-- <td>{{$proker->mulai}}</td>   --}}
                    {{-- <td>{{$proker->selesai}}</td>  --}}
                    <td>{{$proker->tahun}}</td>  
                    <td><a href="/job/proker/{{$proker->id}}/prokeredit" class="btn btn-sm btn-warning">edit</a>
                        <a href="/job/proker/{{$proker->id}}/prokerdelete" class="btn btn-sm btn-danger" 
                            onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
                        <a href="/job/prokertask/{{$proker->id}}" class="btn btn-sm btn-secondary">task</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{$data_proker->links()}}
        </div>



        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Input Proker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/job/prokercreate" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="tahun">Tahun</label>
                                  <select name="tahun" class="form-control" id="tahun">
                                    <option value="">--Tahun--</option>
                                    @foreach ($data_tahun as $tahun)
                                    <option value={{$tahun->param_value}}>{{$tahun->param_desc}}</option>
                                    @endforeach
                                </select>     
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Proker</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="descripsi">Desc</label>
                            <input type="text" name="descripsi" class="form-control" id="descripsi">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select name="jenis" class="form-control" id="jenis">
                                <option value="">--Jenis--</option>
                                @foreach ($data_jenis as $jenis)
                                <option value={{$jenis->param_value}}>{{$jenis->param_desc}}</option>
                                @endforeach
                            </select>  
                        </div>
                        <div class="form-group">
                            <label for="tipe">Tipe</label>
                            <select name="tipe" class="form-control" id="tipe">
                                <option value="">--Tipe--</option>
                                @foreach ($data_tipe as $tipe)
                                <option value={{$tipe->param_value}}>{{$tipe->param_desc}}</option>
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
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="pic_nik">NIK PIC</label>
                                <input type="text" name="pic_nik" class="form-control" id="pic_nik">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="pic_nik">Nama PIC</label>
                                <input type="text" name="nama_pic" class="form-control" id="nama_pic" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            {{-- <input type="text" name="status" class="form-control" id="status"> --}}
                            <select name="status" class="form-control" id="status">
                                <option value="">--Status--</option>
                                @foreach ($data_status as $status)
                                <option value={{$status->param_value}}>{{$status->param_desc}}</option>
                                @endforeach
                            </select>    
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="mulai">Mulai</label>
                                <input type="date" name="mulai" class="form-control" id="mulai">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="selesai">Selesai</label>
                                <input type="date" name="selesai" class="form-control" id="selesai">
                            </div>
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
