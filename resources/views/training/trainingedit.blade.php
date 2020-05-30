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
            <h3>Edit Data Training</h3>
            <div class="row">
                <div class="col-lg-12">
                <form action="/training/training/{{$data_training->id}}/trainingupdate" method="POST" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nama">Kode Training</label>
                        <input type="text" name="kode" class="form-control" id="kode" value="{{$data_training->kode}}">
                      </div>
                      <div class="form-group">
                          <label for="nama">Nama Training</label>
                          <input type="text" name="nama" class="form-control" id="nama" value="{{$data_training->nama}}">
                      </div>
                      <div class="form-group">
                          <label for="program">Program</label>
                          <input type="text" name="program" class="form-control" id="program" value="{{$data_training->program}}">
                      </div>
                      <div class="form-group">
                          <label for="skill">Skill</label>
                          <input type="text" name="skill" class="form-control" id="skill" value="{{$data_training->skill}}">
                      </div>
                      <div class="form-group">
                          <label for="Mulai">Tgl Mulai</label>
                          <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai" value="{{$data_training->tgl_mulai}}">
                      </div>
                      <div class="form-group">
                          <label for="tgl_akhir">Tgl Akhir</label>
                          <input type="date" name="tgl_akhir" class="form-control" id="tgl_akhir" value="{{$data_training->tgl_akhir}}">
                      </div>             
                    <button type="submit" class="btn btn-warning float-left">Update</button>
                </form>
            </div>
            </div>
            </div
  @endsection