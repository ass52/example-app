{{--IMPORTANT: this page will be overwritten and any change will be lost!! Use custom_sidebar_bottom.blade.php and custom_sidebar_top.blade.php--}}

@if(Gate::any(['users_allow', 'users_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "users" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.users.index')}}"><i class="fas fa-address-book fa-fw"></i>Users</a></li>
@endIf
@if(Gate::any(['ad_interstaitals_allow', 'ad_interstaitals_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "ad_interstaitals" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.ad_interstaitals.index')}}"><i class="fas fa-bars fa-fw"></i>Ad interstaitals</a></li>
@endIf
@if(Gate::any(['add_banners_allow', 'add_banners_edit']))
<li class="nav-item{{ $admiko_data['sideBarActive'] === "add_banners" ? " active" : "" }}"><a class="nav-link" href="{{route('admin.add_banners.index')}}"><i class="fas fa-align-justify fa-fw"></i>Add Banners</a></li>
@endIf