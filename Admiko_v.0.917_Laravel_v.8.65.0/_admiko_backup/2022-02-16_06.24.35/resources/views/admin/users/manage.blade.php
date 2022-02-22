@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.users.index") }}">Users</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Users</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.users.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage users_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label">Title:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="title" name="title"  placeholder="Title"  value="{{{ old('title', isset($data)?$data->title : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('title')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="title_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="file" class="col-md-2 col-form-label">File:</label>
                        <div class="col-md-10">
                            @if (isset($data->file) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["file"]['original']["folder"].$data->file))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["file"]['original']["folder"].$data->file)}}" target="_blank">{{$data->file}}</a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="file_admiko_delete" id="file_admiko_delete" value="1">
                                <label class="form-check-label" for="file_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="fileUpload mt-1" id="file" accept="doc" data-type="doc" data-size="30" name="file" >
                            <input type="hidden" id="file_admiko_current" name="file_admiko_current" value="{{$data->file??''}}">
                            <div class="invalid-feedback @if ($errors->has('file')) d-block @endif" data-required="{{trans('admiko.required_text')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('file')){{ $errors->first('file') }}@endif
                            </div>
                            <small id="file_help" class="text-muted">File size limit: 30 MB. {{trans("admiko.file_extension_limit")}}doc. </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer form-actions" id="form-group-buttons">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary float-start me-1 mb-1 mb-sm-0 save-button">{{trans('admiko.table_save')}}</button>
                    <a href="{{ route("admin.users.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection