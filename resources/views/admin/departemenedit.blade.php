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
            <h3>Edit Departemen</h3>
            <div class="row">
                <div class="col-lg-12">
                <form action="/admin/departemen/{{$data_departemen->id}}/departemenupdate" method="POST" >
                    {{ csrf_field() }}

                      <div class="form-group">
                        <label for="kode">Kode Departemen</label>
                        <input type="text" name="kode" class="form-control" id="kode"value="{{$data_departemen->kode}}">
                      </div>
                      <div class="form-group">
                          <label for="nama">Nama Departemen</label>
                      <input type="text" name="nama" class="form-control" id="nama" value="{{$data_departemen->nama}}">
                      </div>
                      <div class="form-group">
                          <label for="nik_kadept">NIK Kadept</label>
                          <input type="text" name="nik_kadept" class="form-control" id="nik_kadept" value="{{$data_departemen->nik_kadept}}">
                      </div>
                      <div class="form-group">
                          <label for="nama_kadept">Nama Kadept</label>
                          <input type="text" name="nama_kadept" class="form-control" id="nama_kadept" value="{{$data_departemen->nama_kadept}}">
                      </div>
                      <div class="form-group">
                          {{-- <label for="divisi_kode">Kode Divisi</label>
                          <input type="text" name="divisi_kode" class="form-control" id="divisi_kode"value="{{$data_departemen->divisi_kode}}"> --}}
                          <select name="divisi_kode" class="form-control">
                            <option value="">Divisi</option>
                            @foreach ($data_divisi as $divisi)
                            {{-- <option value={{$divisi->kode}}>{{$divisi->nama}}</option> --}}
                            {{-- <option value="L" @if ($siswa ->jenis_kelamin == 'L') selected @endif>Laki Laki</option> --}}
                            <option value={{$divisi->kode}} @if ($divisi->kode == $data_departemen->divisi_kode) selected @endif>{{$divisi->nama}}</option>
                            @endforeach
                          </select>
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