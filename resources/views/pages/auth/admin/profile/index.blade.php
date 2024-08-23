@extends('layouts.dashboard')
@section('content')
    @include('components.auth.admin.dashboard.navbarComponent')
    @include('components.auth.admin.dashboard.sidebarComponent')
    @include('/components.auth.admin.profile.mainComponent')
    @include('components.auth.admin.dashboard.footerComponet')
@endsection