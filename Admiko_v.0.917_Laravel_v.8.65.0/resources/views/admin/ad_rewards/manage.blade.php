@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.ad_rewards.index") }}">AD Rewards</a></li>
    @if(isset($data))
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>AD Rewards</h1>
@endsection
@section('pageInfo')
@endsection
@section('backBtn')
<a href="{{ route("admin.ad_rewards.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage ad_rewards_manage admikoForm">
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
                        <label for="app_pkg" class="col-md-2 col-form-label">App pkg:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="app_pkg" name="app_pkg"  placeholder="App pkg"  value="{{{ old('app_pkg', isset($data)?$data->app_pkg : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('app_pkg')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="app_pkg_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="app_platform" class="col-md-2 col-form-label">App platform:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="app_platform" name="app_platform" >
                                <option value="">{{trans("admiko.select")}}</option>
                                @foreach($ad_interstaitals_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('app_platform') ? old('app_platform') : $data->app_platform ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('app_platform')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="app_platform_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="applicense_apk" class="col-md-2 col-form-label">AppLicense Apk:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="applicense_apk" name="applicense_apk"  placeholder="AppLicense Apk"  value="{{{ old('applicense_apk', isset($data)?$data->applicense_apk : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('applicense_apk')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="applicense_apk_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="applicense_playstore" class="col-md-2 col-form-label">AppLicense playstore:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="applicense_playstore" name="applicense_playstore"  placeholder="AppLicense playstore"  value="{{{ old('applicense_playstore', isset($data)?$data->applicense_playstore : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('applicense_playstore')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="applicense_playstore_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="is_app_suspend" class="col-md-2 col-form-label">is App Suspend:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="is_app_suspend" name="is_app_suspend" >
                                <option value="">{{trans("admiko.select")}}</option>
                                @foreach($application_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('is_app_suspend') ? old('is_app_suspend') : $data->is_app_suspend ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('is_app_suspend')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="is_app_suspend_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="verstion_check" class="col-md-2 col-form-label">Verstion check:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="verstion_check" name="verstion_check" >
                                <option value="">{{trans("admiko.select")}}</option>
                                @foreach($verstion_check_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('verstion_check') ? old('verstion_check') : $data->verstion_check ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('verstion_check')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="verstion_check_help" class="text-muted"></small>
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
                    <a href="{{ route("admin.ad_rewards.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection