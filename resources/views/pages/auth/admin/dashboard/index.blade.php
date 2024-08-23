@extends('layouts.dashboard')
@section('content')
    @include('components.auth.admin.dashboard.navbarComponent')
    @include('components.auth.admin.dashboard.sidebarComponent')
    @include('components.auth.admin.dashboard.mainComponent')
    @include('components.auth.admin.dashboard.footerComponet')
@endsection