@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.application.index") }}">{{App\Models\Admin\Application::find(Request()->admiko_application_id)->app_name}}</a></li>
<li class="breadcrumb-item active"><a href="{{ route("admin.add.index",[Request()->admiko_application_id]) }}">Add</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Add</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.add.index",[Request()->admiko_application_id]) }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage add_manage admikoForm">
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
                        <label for="adid" class="col-md-2 col-form-label">Adid:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="adid" name="adid"  placeholder="Adid"  value="{{{ old('adid', isset($data)?$data->adid : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('adid')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="adid_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="interval" class="col-md-2 col-form-label">interval:</label>
                        <div class="col-md-10">
                            <input type="number" class="form-control limitPozNegNumbers numbersWidth" id="interval" name="interval"  placeholder="interval"
                                   step="1" 
                                   value="{{{ old('interval', isset($data)?$data->interval : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('interval')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="interval_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="place_holder_descrption" class="col-md-2 col-form-label">place holder descrption:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="place_holder_descrption" name="place_holder_descrption"  placeholder="place holder descrption"  value="{{{ old('place_holder_descrption', isset($data)?$data->place_holder_descrption : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('place_holder_descrption')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="place_holder_descrption_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="place_holder_name" class="col-md-2 col-form-label">place holder name:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control limitPozNegDecNumbers numbersWidth" id="place_holder_name" name="place_holder_name" 
                                   placeholder="place holder name" step="0.01"  data-decimal="2"
                                   value="{{{ old('place_holder_name', isset($data)?$data->place_holder_name : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('place_holder_name')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="place_holder_name_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="click1" class="col-md-2 col-form-label">Click:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control limitPozNegDecNumbers numbersWidth" id="click1" name="click1" 
                                   placeholder="Click" step="0.01"  data-min="-50" min="-50" data-max="100" max="100" data-decimal="2"
                                   value="{{{ old('click1', isset($data)?$data->click1 : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('click1')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="click1_help" class="text-muted"> Min: -50 Max: 100</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="interval1" class="col-md-2 col-form-label">interval:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control limitPozNegDecNumbers numbersWidth" id="interval1" name="interval1" 
                                   placeholder="interval" step="0.01"  data-min="1" min="1" data-max="100" max="100" data-decimal="2"
                                   value="{{{ old('interval1', isset($data)?$data->interval1 : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('interval1')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="interval1_help" class="text-muted"> Min: 1 Max: 100</small>
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
                    <a href="{{ route("admin.add.index",[Request()->admiko_application_id]) }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection