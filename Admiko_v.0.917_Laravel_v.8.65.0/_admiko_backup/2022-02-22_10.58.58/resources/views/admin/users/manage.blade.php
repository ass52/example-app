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
                        <label for="email" class="col-md-2 col-form-label">Email:*</label>
                        <div class="col-md-10">
                            <input type="email" class="form-control" id="email" name="email" required="true" placeholder="Email"  value="{{{ old('email', $data->email??'') }}}">
                            <div class="invalid-feedback @if ($errors->has('email')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="email_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class=" col-12">
                    <div class="form-group row">
                        <label for="roles1" class="col-md-2 col-form-label">Roles:*</label>
                        <div class="col-md-10">
                            <select class="form-select" id="roles1" name="roles1" required="true">
                                
                                @foreach($roles1_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('roles1') ? old('roles1') : $data->roles1 ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('roles1')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="roles1_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="status1" class="col-md-2 col-form-label">Status:</label>
                        <div class="col-md-10">
                            <select class="form-select" id="status1" name="status1" >
                                <option value="">{{trans("admiko.select")}}</option>
                                @foreach($status1_all as $id => $value)
                                    <option value="{{ $id }}" {{ (old('status1') ? old('status1') : $data->status1 ?? '') == $id ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback @if ($errors->has('status1')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="status1_help" class="text-muted"></small>
                        </div>
                    </div>
                </div>

                <div class=" col-12">
                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label">Name:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="name" name="name"  placeholder="Name"  value="{{{ old('name', isset($data)?$data->name : '') }}}">
                            <div class="invalid-feedback @if ($errors->has('name')) d-block @endif">{{trans('admiko.required_text')}}</div>
                            <small id="name_help" class="text-muted"></small>
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