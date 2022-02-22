@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.add_banners.index") }}">Add Banners</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Add Banners</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.add_banners.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage add_banners_manage admikoForm">
    <legend class="action">{{ isset($data) ? trans('admiko.update') : trans('admiko.add_new') }}</legend>
    <form method="POST" action="{{ $admiko_data['formAction'] }}" enctype="multipart/form-data" class="needs-validation" novalidate>
        @if(isset($data)) @method('PUT') @endIf
        @csrf
        <div class="card-body">
            @if ($errors->any())<div class="row"><div class="col-2"></div><div class="col"><div class="invalid-feedback d-block">@foreach($errors->all() as $error) {{$error}}<br> @endforeach</div></div></div>@endif
            <div class="row">
                
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="app_name" class="col-md-2 col-form-label">App Name:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="app_name" name="app_name"  placeholder="App Name"  value="{{{ old('app_name', isset($data)?$data->app_name : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('app_name')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="app_name_help" class="text-muted"></small>
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
                            <input type="text" class="form-control limitPozNegDecNumbers numbersWidth" id="interval" name="interval" 
                                   placeholder="interval" step="0.01"  data-min="-100" min="-100" data-max="50" max="50" data-decimal="2"
                                   value="{{{ old('interval', isset($data)?$data->interval : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('interval')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="interval_help" class="text-muted"> Min: -100 Max: 50</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="click" class="col-md-2 col-form-label">click:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control limitPozNegDecNumbers numbersWidth" id="click" name="click" 
                                   placeholder="click" step="0.01"  data-min="-100" min="-100" data-max="100" max="100" data-decimal="2"
                                   value="{{{ old('click', isset($data)?$data->click : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('click')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="click_help" class="text-muted"> Min: -100 Max: 100</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="place_holder_name" class="col-md-2 col-form-label">Place holder name:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="place_holder_name" name="place_holder_name"  placeholder="Place holder name"  value="{{{ old('place_holder_name', isset($data)?$data->place_holder_name : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('place_holder_name')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="place_holder_name_help" class="text-muted"></small>
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
                    <a href="{{ route("admin.add_banners.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection