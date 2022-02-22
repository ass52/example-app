@extends("admin.layouts.default")
@section('breadcrumbs')
    <li class="breadcrumb-item active"><a href="{{ route("admin.application.index") }}">Application</a></li>
    @if(isset($data))
		<li class="breadcrumb-item active" aria-current="page">{{$data->app_name}}</li>
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_edit')}}</li>
    @else
        <li class="breadcrumb-item active" aria-current="page">{{trans('admiko.page_breadcrumbs_add')}}</li>
    @endIf
@endsection
@section('pageTitle')
<h1>Application</h1>
@endsection
@section('pageInfo')App
@endsection
@section('backBtn')
<a href="{{ route("admin.application.index") }}"><i class="fas fa-angle-left"></i> {{trans('admiko.page_back_btn')}}</a>
@endsection
@section('content')
<div class="card formPage application_manage admikoForm">
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
                        <label for="appdescrption" class="col-md-2 col-form-label">AppDescrption:</label>
                        <div class="col-md-10">
                            <textarea class="form-control form-control-textarea " id="appdescrption" name="appdescrption"  placeholder="AppDescrption">{{{ old('appdescrption', isset($data)?$data->appdescrption : '') }}}</textarea>
                            <div class="invalid-feedback @if ($errors->has('appdescrption')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="appdescrption_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="app_pkg" class="col-md-2 col-form-label">App Pkg:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="app_pkg" name="app_pkg"  placeholder="App Pkg"  value="{{{ old('app_pkg', isset($data)?$data->app_pkg : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('app_pkg')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="app_pkg_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="appicon" class="col-md-2 col-form-label">Appicon:</label>
                        <div class="col-md-10">
                            @if (isset($data->appicon) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["appicon"]['original']["folder"].$data->appicon))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["appicon"]['original']["folder"].$data->appicon)}}" target="_blank">{{$data->appicon}}</a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="appicon_admiko_delete" id="appicon_admiko_delete" value="1">
                                <label class="form-check-label" for="appicon_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="fileUpload mt-1" id="appicon"  name="appicon" >
                            <input type="hidden" id="appicon_admiko_current" name="appicon_admiko_current" value="{{$data->appicon??''}}">
                            <div class="invalid-feedback @if ($errors->has('appicon')) d-block @endif" data-required="{{trans('admiko.required_text')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('appicon')){{ $errors->first('appicon') }}@endif
                            </div>
                            <small id="appicon_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="appwidelog" class="col-md-2 col-form-label">AppWidelog:</label>
                        <div class="col-md-10">
                            @if (isset($data->appwidelog) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["appwidelog"]['original']["folder"].$data->appwidelog))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["appwidelog"]['original']["folder"].$data->appwidelog)}}" target="_blank">{{$data->appwidelog}}</a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="appwidelog_admiko_delete" id="appwidelog_admiko_delete" value="1">
                                <label class="form-check-label" for="appwidelog_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="fileUpload mt-1" id="appwidelog"  name="appwidelog" >
                            <input type="hidden" id="appwidelog_admiko_current" name="appwidelog_admiko_current" value="{{$data->appwidelog??''}}">
                            <div class="invalid-feedback @if ($errors->has('appwidelog')) d-block @endif" data-required="{{trans('admiko.required_text')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('appwidelog')){{ $errors->first('appwidelog') }}@endif
                            </div>
                            <small id="appwidelog_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="apptv_binner" class="col-md-2 col-form-label">AppTv binner:</label>
                        <div class="col-md-10">
                            @if (isset($data->apptv_binner) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["apptv_binner"]['original']["folder"].$data->apptv_binner))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["apptv_binner"]['original']["folder"].$data->apptv_binner)}}" target="_blank">{{$data->apptv_binner}}</a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="apptv_binner_admiko_delete" id="apptv_binner_admiko_delete" value="1">
                                <label class="form-check-label" for="apptv_binner_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="fileUpload mt-1" id="apptv_binner"  name="apptv_binner" >
                            <input type="hidden" id="apptv_binner_admiko_current" name="apptv_binner_admiko_current" value="{{$data->apptv_binner??''}}">
                            <div class="invalid-feedback @if ($errors->has('apptv_binner')) d-block @endif" data-required="{{trans('admiko.required_text')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('apptv_binner')){{ $errors->first('apptv_binner') }}@endif
                            </div>
                            <small id="apptv_binner_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="appsplashimage" class="col-md-2 col-form-label">AppSplashImage:</label>
                        <div class="col-md-10">
                            @if (isset($data->appsplashimage) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["appsplashimage"]['original']["folder"].$data->appsplashimage))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["appsplashimage"]['original']["folder"].$data->appsplashimage)}}" target="_blank">{{$data->appsplashimage}}</a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="appsplashimage_admiko_delete" id="appsplashimage_admiko_delete" value="1">
                                <label class="form-check-label" for="appsplashimage_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="fileUpload mt-1" id="appsplashimage"  name="appsplashimage" >
                            <input type="hidden" id="appsplashimage_admiko_current" name="appsplashimage_admiko_current" value="{{$data->appsplashimage??''}}">
                            <div class="invalid-feedback @if ($errors->has('appsplashimage')) d-block @endif" data-required="{{trans('admiko.required_text')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('appsplashimage')){{ $errors->first('appsplashimage') }}@endif
                            </div>
                            <small id="appsplashimage_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="appbackground" class="col-md-2 col-form-label">AppBackground:</label>
                        <div class="col-md-10">
                            @if (isset($data->appbackground) && Storage::disk(config("admiko_config.filesystem"))->exists($admiko_data['fileInfo']["appbackground"]['original']["folder"].$data->appbackground))
                            <a href="{{ Storage::disk(config("admiko_config.filesystem"))->url($admiko_data['fileInfo']["appbackground"]['original']["folder"].$data->appbackground)}}" target="_blank">{{$data->appbackground}}</a><br>
                                <div class="form-check form-checkbox">
                                <input class="form-check-input" type="checkbox" name="appbackground_admiko_delete" id="appbackground_admiko_delete" value="1">
                                <label class="form-check-label" for="appbackground_admiko_delete"> {{trans('admiko.remove_file')}}</label>
                            </div>
                            @endif
                            <input type="file" class="fileUpload mt-1" id="appbackground"  name="appbackground" >
                            <input type="hidden" id="appbackground_admiko_current" name="appbackground_admiko_current" value="{{$data->appbackground??''}}">
                            <div class="invalid-feedback @if ($errors->has('appbackground')) d-block @endif" data-required="{{trans('admiko.required_text')}}" data-size="{{trans('admiko.required_size')}}" data-type="{{trans('admiko.required_type')}}">
                                @if ($errors->has('appbackground')){{ $errors->first('appbackground') }}@endif
                            </div>
                            <small id="appbackground_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="adprimary_colour" class="col-md-2 col-form-label">Adprimary colour:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="adprimary_colour" name="adprimary_colour"  placeholder="Adprimary colour"  value="{{{ old('adprimary_colour', isset($data)?$data->adprimary_colour : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('adprimary_colour')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="adprimary_colour_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="adsecoundry_colur" class="col-md-2 col-form-label">Adsecoundry Colur:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="adsecoundry_colur" name="adsecoundry_colur"  placeholder="Adsecoundry Colur"  value="{{{ old('adsecoundry_colur', isset($data)?$data->adsecoundry_colur : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('adsecoundry_colur')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="adsecoundry_colur_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="appthiredcolur" class="col-md-2 col-form-label">AppthiredColur:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="appthiredcolur" name="appthiredcolur"  placeholder="AppthiredColur"  value="{{{ old('appthiredcolur', isset($data)?$data->appthiredcolur : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('appthiredcolur')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="appthiredcolur_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="verstion_code" class="col-md-2 col-form-label">verstion code:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control limitPozNegDecNumbers numbersWidth" id="verstion_code" name="verstion_code" 
                                   placeholder="verstion code" step="0.01"  data-min="-50" min="-50" data-max="100" max="100" data-decimal="2"
                                   value="{{{ old('verstion_code', isset($data)?$data->verstion_code : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('verstion_code')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="verstion_code_help" class="text-muted"> Min: -50 Max: 100</small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="verstion_name" class="col-md-2 col-form-label">verstion name:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="verstion_name" name="verstion_name"  placeholder="verstion name"  value="{{{ old('verstion_name', isset($data)?$data->verstion_name : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('verstion_name')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="verstion_name_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="verstion_force_update1" class="col-md-2 col-form-label">verstion force update:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="verstion_force_update1" name="verstion_force_update1" >
                                <option value="">{{trans("admiko.select")}}</option>
                                @foreach($verstion_force_update1_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('verstion_force_update1') ? old('verstion_force_update1') : $data->verstion_force_update1 ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('verstion_force_update1')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="verstion_force_update1_help" class="text-muted"></small>
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
                    <a href="{{ route("admin.application.index") }}" class="btn btn-secondary float-end" role="button">{{trans('admiko.table_cancel')}}</a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection