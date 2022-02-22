@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.ad_interstaitals.index") }}">Ad interstaitals</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Ad interstaitals</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.ad_interstaitals.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage ad_interstaitals_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="appname" class="col-md-2 col-form-label">AppName:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="appname" name="appname"  placeholder="AppName"  value="{{{ old('appname', isset($data)?$data->appname : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('appname')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="appname_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="ad_id" class="col-md-2 col-form-label">Ad id:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="ad_id" name="ad_id"  placeholder="Ad id"  value="{{{ old('ad_id', isset($data)?$data->ad_id : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('ad_id')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="ad_id_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="status" class="col-md-2 col-form-label">Status:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="status" name="status" >
                                <option value="">{{trans("admiko.select")}}</option>
                                @foreach($status_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('status') ? old('status') : $data->status ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('status')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="status_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="interval" class="col-md-2 col-form-label">interval:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="interval" name="interval"  placeholder="interval"  value="{{{ old('interval', isset($data)?$data->interval : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('interval')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="interval_help" class="text-muted"></small>
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
                    <a href="{{ route("admin.ad_interstaitals.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection