@extends('admin.layouts.default')

@section('content')

<div class="container-fluid">
    <!-- Page Heading -->

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Permissions</li>
                </ol>
            </nav>
            <h1 class="h3 mb-1 text-gray-800">Permissions</h1>
            <p class="mb-4">You are one of the <b>{{ $data['name'] }}s</b> of this website. The permissions that you have, are enlisted below:</p>
            <br>
            @foreach ($data['permissions'] as $index => $value)

            @php
                $className = $index % 4 === 0 ? 'border-left-primary' :
                ($index % 4 === 1 ? 'border-left-secondary' :
                ($index % 4 === 2 ? 'border-left-info' :
                ($index % 4 === 3 ? 'border-left-warning' :
                'border-left-dark')));
            @endphp

            <div class="card mb-4 py-3 {{ $className }}">
                <div class="card-body">
                    {{ $value['name'] }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@stop
