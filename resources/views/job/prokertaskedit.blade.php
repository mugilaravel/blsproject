@extends('layout.master')

@section('content_lable')
<a href="/job/proker">Back</a>
@endsection

@section('urlCari')
{{-- /admin/init/role --}}
@endsection
@section('content_footer')
    Content Footiii
@endsection


@section('content_main')
    <div class="card-body table-responsive p-0">
            @if (session('sukses'))
                <div class="alert alert-primary" role="alert">
                    {{session('sukses')}}
                </div>
            @endif
            <div class="row text-nowrap">
                <div class="col-12" style=" padding-top: 5px;">
                    <h3>Program Kerja: {{$data_proker->nama}} </h3>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-12">
                        Deskripsi :{{$data_proker->descripsi}}<br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Kode : {{$data_proker->kode}}<br>
                    </div>
                    <div class="col-4">
                        Tahun : {{$data_proker->tahun}}<br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        Jenis :{{$data_jenis->param_desc}}<br>
                    </div>
                    <div class="col-4">
                        Tipe :{{$data_tipe->param_desc}}<br>
                   </div>
                </div>
                <div class="row">
                   <div class="col-4">
                       Divisi :{{$data_proker->divisi->nama}}<br>
                   </div>
                   <div class="col-4">
                       Departemen :{{$data_proker->departemen->nama}}<br>
                  </div>
               </div>
               <div class="row">
                   <div class="col-4">
                       Status:{{$data_statusproker->param_desc}}<br>
                   </div>
                   <div class="col-4">
                  </div>
               </div>
               <div class="row">
                   <div class="col-4">
                       Mulai :{{$data_proker->mulai}}<br>
                   </div>
                   <div class="col-4">
                       Selesai :{{$data_proker->selesai}}<br>
                  </div>
               </div>


            @if (session('sukses'))
            <div class="alert alert-primary" role="alert">
                {{session('sukses')}}
            </div>
        @endif
        <h3>Edit Task:: {{$data_prokertask->nama}}</h3>
        <div class="row">
            <div class="col-lg-12">
            <form action="/job/prokertask/{{$data_prokertask->id}}/prokertaskupdate" method="POST" enctype="multipart/form-data" >
                {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="proker_kode">Kode Proker</label>
                                <input type="text" name="proker_kode" class="form-control" id="proker_kode" value="{{$data_proker->kode}}" readonly>
                            </div>
                            <div class="form-group col-md-9">
                                <label for="nama"> Nama Task</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="{{$data_prokertask->nama}}" >
                            </div>
                        </div>
                            <div class="form-group col-md-12">
                                <label for="descripsi">descripsi </label>
                                <input type="text" name="descripsi" class="form-control" id="descripsi" value="{{$data_prokertask->descripsi}}">
                            </div>
        
                            {{-- <div class="form-group col-md-12">
                                <label for="jenis">jenis </label>
                                <input type="text" name="jenis" class="form-control" id="jenis" value="{{$data_prokertask->jenis}}">
                            </div> --}}
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="pic_nik"> pic_nik</label>
                                    <input type="text" name="pic_nik" class="form-control" id="pic_nik" value="{{$data_prokertask->pic_nik}}">
                                </div>
                            
                                <div class="form-group col-md-5">
                                    <label for="status">status </label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="">--Status--</option>
                                        @foreach ($data_status as $status)
                                        <option value={{$status->param_value}} @if ($data_prokertask->status == $status->param_value) selected @endif>{{$status->param_desc}}</option>
                                        @endforeach
                                    </select>   
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="bobot">bobot </label>
                                    <input type="text" name="bobot" class="form-control" id="bobot" value="{{$data_prokertask->bobot}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="mulai">mulai </label>
                                    <input type="date" name="mulai" class="form-control" id="mulai" value="{{$data_prokertask->mulai}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="selesai">selesai </label>
                                    <input type="date" name="selesai" class="form-control" id="selesai" value="{{$data_prokertask->selesai}}">
                                </div>
                            </div>


                            <div class="form-group col-md-12">
                                <label for="doc_path">Upload </label>
                                <input type="file" name="doc_path_filename" class="form-control" id="doc_path_filename">
                                {{-- <input type="file" name="doc_path" class="form-control" id="doc_path" value="{{$data_prokertask->doc_path}}"> --}}
                            </div>


                            <div class="form-group col-md-12">
                                <label for="doc_path_filename">doc_path </label>
                                <input type="text" name="doc_path" 
                                    class="form-control" id="doc_path" 
                                    value="{{$data_prokertask->doc_path}}">
                            </div>
                            <div class="modal-footer">
                                <a href="{{ url()->previous() }}" class="btn btn-sm btn-warning">Batal</a>
                                <button type="submit" class="btn btn-sm btn-warning float-left">Update</button>
                            </div> 
            </form>
        </div>
    </div>
                    </form>
                </div>
            </div>
        </div>

        

@endsection

@section('footer')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="divisi_kode"]').on('change', function() {
            var divisi_kode = $(this).val();
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
    });
</script>
@endsection
