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
            <h3>Edit Parameter</h3>
            <div class="row">
                <div class="col-lg-12">
                <form action="/admin/param/{{$data_param->id}}/paramupdate" method="POST" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="kode">Param Key</label>
                    <input type="text" name="param_key" class="form-control" id="param_key" value="{{$data_param->param_key}}">
                      </div>
                      <div class="form-group">
                          <label for="param_value">Param Value</label>
                          <input type="text" name="param_value" class="form-control" id="param_value" value="{{$data_param->param_value}}">
                      </div>
                      <div class="form-group">
                          <label for="param_desc">Param Desc</label>
                          <input type="text" name="param_desc" class="form-control" id="param_desc" value="{{$data_param->param_desc}}">
                      </div>
                      <div class="form-group">
                          <label for="param_status">Param Status</label>
                          <input type="text" name="param_status" class="form-control" id="param_status" value="{{$data_param->param_status}}">
                      </div>
                      <div class="form-group">
                          <label for="param_seq">Param Seq</label>
                          <input type="text" name="param_seq" class="form-control" id="param_seq" value="{{$data_param->param_seq}}">
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