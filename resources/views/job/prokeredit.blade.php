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
                <form action="/job/proker/{{$data_proker->id}}/prokerupdate" method="POST" >
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="tahun">Tahun</label>
                            <select name="tahun" class="form-control">
                                <option value="">Tahun</option>
                                <option value='2019' @if ($data_proker->tahun == '2019') selected @endif>2019</option>
                                <option value='2020' @if ($data_proker->tahun == '2020') selected @endif>2020</option>
                                <option value='2021' @if ($data_proker->tahun == '2021') selected @endif>2021</option>
                              </select>
                        </div>
                        <div class="form-group col-md-8">
                        <label for="kode">Kode Proker</label>
                        <input type="text" name="kode" class="form-control" id="kode">
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
                        <select name="jenis" class="form-control">
                            <option value="">Jenis</option>
                            <option value='RTN'>Rutin</option>
                            <option value='NIS'>Non IS</option>
                            <option value='IS'>IS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="divisi">Divisi</label>
                        <select name="divisi_kode" class="form-control" id="divisi_kode">
                            <option value="">Divisi</option>
                            @foreach ($data_divisi as $divisi)
                            <option value={{$divisi->kode}} @if ($divisi->kode == $data_proker->divisi_kode) selected @endif>{{$divisi->nama}}</option>
                            {{-- <option value={{$divisi->kode}}>{{$divisi->nama}}</option> --}}
                            @endforeach
                        </select>                        
                    </div>
                    <div class="form-group">
                        <label for="departemen">Departemen</label>
                        <select name="departemen_kode" class="form-control" id="departemen_kode">
                            <option value="">Departemen</option>
                            @foreach ($data_departemen as $departemen)
                            {{-- <option value={{$departemen->kode}}>{{$departemen->nama}}</option> --}}
                            <option value={{$departemen->kode}} @if ($departemen->kode == $data_proker->departemen_kode) selected @endif>{{$departemen->nama}}</option>
                            @endforeach
                        </select>       
                    </div>
                    <div class="form-group">
                        <label for="pic_nik">NIK PIC</label>
                        <input type="text" name="pic_nik" class="form-control" id="pic_nik">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control" id="status">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="mulai">Mulai</label>
                            <input type="date" name="mulai" class="form-control" id="mulai">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="selesai">Selesai</label>
                            <input type="date" name="selesai" class="form-control" id="selesai">
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
    });
    </script>
@endsection