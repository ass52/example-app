{{--IMPORTANT: this page will be overwritten and any change will be lost!! Use custom_sidebar_bottom.blade.php and custom_sidebar_top.blade.php--}}

@if(Gate::any(['users_allow', 'users_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "users" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.users.index')}}"><i class="fas fa-address-book fa-fw"></i>Users</a></li>
@endIf
@if(Gate::any(['import1_allow', 'import1_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "import1" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.import1.index')}}"><i class="fas fa-file-alt fa-fw"></i>Import</a></li>
@endIf