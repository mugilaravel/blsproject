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
            <h3>Edit Program Kerja</h3>
            <div class="row">
                <div class="col-lg-12">
                <form action="/job/proker/{{$data_proker->id}}/prokerupdate" method="POST" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="tahun">Tahun</label>
                            <select name="tahun" class="form-control" id="tahun">
                                @foreach ($data_tahun as $tahun)
                                    <option value={{$tahun->param_value}} @if ($data_proker->tahun == $tahun->param_value) selected @endif>{{$tahun->param_desc}}</option>
                                @endforeach
                            </select>    
                        </div>
                        <div class="form-group col-md-8">
                        <label for="kode">Kode Proker</label>
                        <input type="text" name="kode" class="form-control" id="kode" value="{{$data_proker->kode}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Proker</label>
                        <input type="text" name="nama" class="form-control" id="nama" value='{{$data_proker->nama}}'>
                    </div>
                    <div class="form-group">
                        <label for="descripsi">Desc</label>
                        <input type="text" name="descripsi" class="form-control" id="descripsi" value='{{$data_proker->descripsi}}'>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" class="form-control" id="jenis">
                            @foreach ($data_jenis as $jenis)
                                <option value={{$jenis->param_value}} @if ($data_proker->jenis == $jenis->param_value) selected @endif>{{$jenis->param_desc}}</option>
                            @endforeach
                        </select>  
                    </div>

                    <div class="form-group">
                        <label for="tipe">Tipe</label>
                        <select name="tipe" class="form-control" id="tipe">
                            <option value="">--Tipe--</option>
                            @foreach ($data_tipe as $tipe)
                                <option value={{$tipe->param_value}} @if ($data_proker->tipe == $tipe->param_value) selected @endif>{{$tipe->param_desc}}</option>
                            @endforeach
                        </select>  
                    </div>

                    <div class="form-group">
                        <label for="divisi">Divisi</label>
                        <select name="divisi_kode" class="form-control" id="divisi_kode">
                            <option value="">Divisi</option>
                            @foreach ($data_divisi as $divisi)
                            <option value={{$divisi->kode}} @if ($divisi->kode == $data_proker->divisi_kode) selected @endif>{{$divisi->nama}}</option>
                            @endforeach
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="departemen">Departemen</label>
                        <select name="departemen_kode" class="form-control" id="departemen_kode">
                            <option value="">Departemen</option>
                            @foreach ($data_departemen as $departemen)
                            <option value={{$departemen->kode}} @if ($departemen->kode == $data_proker->departemen_kode) selected @endif>{{$departemen->nama}}</option>
                            @endforeach
                        </select>       
                    </div>
                    {{-- <div class="form-group">
                        <label for="pic_nik">NIK PIC</label>
                        <input type="text" name="pic_nik" class="form-control" id="pic_nik" value="{{$data_proker->pic_nik}}">
                    </div> --}}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="pic_nik">NIK PIC</label>
                            <input type="text" name="pic_nik" class="form-control" id="pic_nik" value="{{$data_proker->pic_nik}}">
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
                            @foreach ($data_status as $status)
                                <option value={{$status->param_value}} @if ($data_proker->status == $status->param_value) selected @endif>{{$status->param_desc}}</option>
                            @endforeach
                        </select>  
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="mulai">Mulai</label>
                            <input type="date" name="mulai" class="form-control" id="mulai" value='{{$data_proker->mulai}}'>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="selesai">Selesai</label>
                            <input type="date" name="selesai" class="form-control" id="selesai" value='{{$data_proker->selesai}}'>
                        </div>
                    </div>

                      <div class="modal-footer">
                          <a href="{{ url()->previous() }}" class="btn btn-sm btn-warning">Batal</a>
                          <button type="submit" class="btn btn-sm btn-warning float-left">Update</button>
                      </div> 
                </form>
            </div>
        {{-- </div>
        </div --}}
@endsection

  @section('footer')
  <script type="text/javascript">
    $(document).ready(function() {
        $('select[name="divisi_kode"]').on('change', function() {
            var divisi_kode = $(this).val();
            // alert('tes....................'+stateID);
            if(divisi_kode) {
                $.ajax({
                    url: '/admin/departemen/'+divisi_kode+'/departemenbydivisi',
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        // alert(JSON.stringify(data));
                        $('select[name="departemen_kode"]').empty();
                        $.each(data, function(key, value) {
                            // alert(JSON.stringify(value));
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

        var nik = "{{$data_proker->pic_nik}}";
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



    });
    </script>
@endsection