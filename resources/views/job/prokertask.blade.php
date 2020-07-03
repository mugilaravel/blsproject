 @extends('layout.master')

 @section('content_lable')
 <a href="/job/proker">Back</a>
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

             </div>
             <div class="col-12" style="padding-top: 5px;">
                <button type="button" class="btn btn-primary btn-sm float-right"  
                        data-toggle="modal" data-target="#staticBackdrop">Tambah Task
                </button>
            </div>
                 <table class="table table-hover text-nowrap">
                     <tr>
                     <th>Kode</th>
                     <th>Nama Task</th>
                     {{-- <th>Task Descripsi</th> --}}
                     <th>Status</th>
                     {{-- <th>Dokumen File</th> --}}
                     <th>Aksi</th>
                 </tr>
                 @foreach ($data_prokertask as $prokertask)
                 <tr>     
                    <td>{{$prokertask->kode}}</td>
                     <td>{{$prokertask->nama}}</td>  
                     {{-- <td>{{$prokertask->descripsi}}</td>   --}}
                     <td>{{$prokertask->status}}</td>  
                     {{-- <td>{{$prokertask->doc_path}}</td>  --}}
                    
                     <td><a href="/job/prokertask/{{$prokertask->id}}/prokertaskedit" class="btn btn-sm btn-warning">edit</a>
                         <a href="/job/prokertask/{{$prokertask->id}}/prokertaskdelete" class="btn btn-sm btn-danger" 
                             onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
                     </td>
                 </tr>
                 @endforeach
             </table>
             {{$data_prokertask->links()}}
         </div>
 
         <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
             <div class="modal-content" style="width: 100%;">
                 <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel">Input Task</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                 </div>
                 <div class="modal-body">
                     <form action="/job/prokertaskcreate" method="POST" enctype="multipart/form-data">
                         {{ csrf_field() }}
                            <div class="form-group col-md-12">
                                <label for="proker_kode">Kode Proker</label>
                            <input type="text" name="proker_kode" class="form-control" id="proker_kode" value="{{$data_proker->kode}}" readonly>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="nama"> Nama Task</label>
                                <input type="text" name="nama" class="form-control" id="nama">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="descripsi">descripsi </label>
                                <input type="text" name="descripsi" class="form-control" id="descripsi">
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
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="status">status </label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="">--Status--</option>
                                        @foreach ($data_status as $status)
                                        <option value={{$status->param_value}}>{{$status->param_desc}}</option>
                                        @endforeach
                                    </select>   
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="bobot">bobot </label>
                                    <input type="text" name="bobot" class="form-control" id="bobot">
                                </div>
                            </div>

                           
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="mulai">mulai </label>
                                    <input type="date" name="mulai" class="form-control" id="mulai">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="selesai">selesai </label>
                                    <input type="date" name="selesai" class="form-control" id="selesai">
                                </div>
                            </div>
                             <div class="form-group col-md-12">
                                <label for="doc_path">doc_path </label>
                                <input type="file" name="doc_path" class="form-control" id="doc_path">
                            </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Submit</button>
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
                            alert("Nik Tidk ditemukan");
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
 