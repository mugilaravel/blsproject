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
            <h3>Edit Divisi</h3>
            <div class="row">
                <div class="col-lg-12">
                <form action="/admin/divisi/{{$data_divisi->id}}/divisiupdate" method="POST" >
                    {{ csrf_field() }}

                    <div class="form-group">
                          <label for="kode">Kode Divisi</label>
                    <input type="text" name="kode" class="form-control" id="kode" value="{{$data_divisi->kode}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Divisi</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="{{$data_divisi->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="nik_kadiv">NIK Kadiv</label>
                            <input type="text" name="nik_kadiv" class="form-control" id="nik_kadiv"value="{{$data_divisi->nik_kadiv}}">
                        </div>
                        <div class="form-group">
                            <label for="nama_kadiv">Nama Kadiv</label>
                            <input type="text" name="nama_kadiv" class="form-control" id="nama_kadiv" value="{{$data_divisi->nama_kadiv}}">
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