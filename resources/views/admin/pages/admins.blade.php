@extends('admin.layouts.datatable-default')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <!-- Page Heading -->
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </nav>

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                @if(auth()->guard('admin')->user()->hasPermissionTo('add user'))
                    <a href="{{ route('create-admin-view') }}">
                        <button style="margin-bottom:30px;" type="button" class="btn btn-primary">
                            Add User
                        </button>
                    </a>
                @endif
                @if(auth()->guard('admin')->user()->hasPermissionTo('export user'))
                    <a href="{{ route('export-admins') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Export Users</a>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            @livewire('admin-table')
        </div>
    </div>
</div>


@stop
