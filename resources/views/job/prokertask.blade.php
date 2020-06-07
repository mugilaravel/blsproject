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
                Kode : {{$data_proker->kode}}<br>
                Tahun : {{$data_proker->tahun}}<br>
                Deskripsi :{{$data_proker->descripsi}}<br>
                Jenis :{{$data_jenis->param_desc}}<br>
                Tipe :{{$data_tipe->param_desc}}<br>
                Divisi :{{$data_proker->divisi->nama}}<br>
                Departemen :{{$data_proker->departemen->nama}}<br>
                Status:{{$data_statusproker->param_desc}}<br>
                Mulai :{{$data_proker->mulai}}<br>
                Selesai :{{$data_proker->selesai}}<br>
             </div>
             <div class="col-12" style="padding-top: 5px;">
                <button type="button" class="btn btn-primary btn-sm float-right"  
                        data-toggle="modal" data-target="#staticBackdrop">Tambah Task
                </button>
            </div>
                 
                 <table class="table table-hover text-nowrap">
                     <tr>
                     <th>Kode</th>
                     {{-- <th>proker kode</th> --}}
                     {{-- <th>Nama Proker</th> --}}
                     <th>Nama Task</th>
                     <th>Task Descripsi</th>
                     <th>Jenis</th>
                     {{-- <th>Departemen</th> --}}
                     {{-- <th>Divisi</th> --}}
                     {{-- <th>PIC</th> --}}
                     <th>Status</th>
                     <th>Mulai</th>
                     <th>Selesai</th>
                     <th>NIK Review</th>
                     <th>Dokumen File</th>
                     {{-- <th>Tahun</th> --}}
                     <th>Aksi</th>
                 </tr>
                 @foreach ($data_prokertask as $prokertask)
                 <tr>     
                     {{-- 'kode' 'proker_kode' nama descripsi jenis pic_nik review_nik review_desc status mulai selesai doc_path --}}

                    <td>{{$prokertask->kode}}</td>
                     {{-- <td>{{$prokertask->proker_kode}}</td>  --}}
                     {{-- <td>Nm Proker</td> --}}
                     <td>{{$prokertask->nama}}</td>  
                     <td>{{$prokertask->descripsi}}</td>  
                     <td>{{$prokertask->jenis}}</td>  
                     {{-- <td>{{$prokertask->proker->departemen->departemen_kode}}</td>   --}}
                     {{-- <td>Divisi</td>   --}}
                     <td>{{$prokertask->status}}</td>  
                     <td>{{$prokertask->mulai}}</td>  
                     <td>{{$prokertask->selesai}}</td> 
                     <td>{{$prokertask->review_nik}}</td>  
                     <td>{{$prokertask->doc_path}}</td> 
                     {{-- <td>{{$prokertask->tahun}}</td>  --}}
                    
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
             <div class="modal-content">
                 <div class="modal-header">
                 <h5 class="modal-title" id="staticBackdropLabel">Input Task</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                 </div>
                 <div class="modal-body">
                     <form action="/job/prokertaskcreate" method="POST">
                         {{ csrf_field() }}
                         {{-- <div class="form-group col-md-8">
                            <label for="proker_id">proker_id</label>
                         <input type="text" name="proker_id" class="form-control" id="proker_id" value="{{$data_proker->id}}">
                        </div> --}}
  
                            {{-- <div class="form-group col-md-8">
                                <label for="kodetask">Kode Task</label>
                                <input type="text" name="kode" class="form-control" id="kode">
                            </div> --}}
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
        
                            <div class="form-group col-md-12">
                                <label for="jenis">jenis </label>
                                <input type="text" name="jenis" class="form-control" id="jenis">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="pic_nik"> pic_nik</label>
                                <input type="text" name="pic_nik" class="form-control" id="pic_nik">
                            </div>
 
                            {{-- <div class="form-group col-md-8">
                                <label for="review_nik">review_nik </label>
                                <input type="text" name="review_nik" class="form-control" id="review_nik">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="review_desc">review_desc </label>
                                <input type="text" name="review_desc" class="form-control" id="review_desc">
                            </div> --}}
                            <div class="form-group col-md-12">
                                <label for="status">status </label>
                                {{-- <input type="text" name="status" class="form-control" id="status"> --}}
                                <select name="status" class="form-control" id="status">
                                    <option value="">--Status--</option>
                                    @foreach ($data_status as $status)
                                    <option value={{$status->param_value}}>{{$status->param_desc}}</option>
                                    @endforeach
                                </select>   
                            </div>
                            <div class="form-group col-md-12">
                                <label for="doc_path">doc_path </label>
                                <input type="text" name="doc_path" class="form-control" id="doc_path">
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
                            
{{-- 'kode' 'proker_kode' nama descripsi jenis pic_nik review_nik review_desc status mulai selesai doc_path --}}
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
             // alert('tes....................'+stateID);
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
 