{{--IMPORTANT: this page will be overwritten and any change will be lost!! Use custom_sidebar_bottom.blade.php and custom_sidebar_top.blade.php--}}

@if(Gate::any(['users_allow', 'users_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "users" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.users.index')}}"><i class="fas fa-address-book fa-fw"></i>Users</a></li>
@endIf
@if(Gate::any(['application_allow', 'application_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "application" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.application.index')}}"><i class="fas fa-address-card fa-fw"></i>Application</a></li>
@endIf