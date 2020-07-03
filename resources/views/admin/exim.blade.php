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
    <div class="card-body table-responsive p-0">
        <div class="col-6" style="padding-top: 5px;">
            <a href="/admin/user/export" class="btn btn-sm btn-primary float-right">Export Excel</a>
            {{-- <a href="/admin/user/import" class="btn btn-sm btn-primary float-right">Import Excel</a> --}}
            {{-- <a href="/admin/user/exportpdf" class="btn btn-sm btn-primary float-right">Export Pdf</a> --}}
            <button type="button" class="btn btn-primary btn-sm float-right"  
                    data-toggle="modal" data-target="#staticBackdrop">Import Excel
            </button>&nbsp;
        </div>
    </div> 



    <div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Input Divisi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" class="form-control">
                    <br>
                    <button class="btn btn-success">Import User Data</button>
                    <a class="btn btn-warning" href="{{ route('exim') }}">Export User Data</a>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection