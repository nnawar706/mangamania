@extends('admin.layouts.default')

@if (session('message'))
    <div class="toast show fixed-bottom ms-auto text-bg-danger" style="--bs-bg-opacity: .8;" animation="true" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('message') }}
            </div>
        </div>
    </div>
@endif

@if (isset($message))
    <div class="toast show fixed-bottom ms-auto text-bg-danger" style="--bs-bg-opacity: .8;" animation="true" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                {{ $message }}
            </div>
        </div>
    </div>
@endif

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('show-items') }}">Series</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h6 class="h4 mb-0 text-gray-800">New Series</h6>
                
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Import Series</a>
            </div>
            <hr>
            <form method="post" action="{{ route('create-item') }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGrid" name="title" required>
                            <label for="floatingInputGrid">Title</label>
                        </div>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGrid" name="author" required>
                            <label for="floatingInputGrid">Author Name</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGrid" name="magazine" required>
                            <label for="floatingInputGrid">Magazine</label>
                        </div>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <select class="form-select" name="genre_id" id="floatingSelectGrid" aria-label="Floating label select example" required>
                                <option selected>Select Genre</option>
                                @foreach($data as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelectGrid">Genre</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-floating">
                        <textarea class="form-control" name="detail" id="floatingTextarea2" style="height: 120px" required></textarea>
                        <label for="floatingTextarea2">Details</label>
                    </div>
                </div>
                <div class="row g-2 mb-3">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInputGrid" name="meta_keywords" aria-describedby="HelpBlock" required>
                            <label for="floatingInputGrid">Keywords</label>
                            <div id="passwordHelpBlock" class="form-text">
                                Insert maximum 5 comma seperated keywords to better describe the series.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="file-drop-area">
                        <span class="choose-file-button">Choose Image File (.png,.jpg,.jpeg)</span>
                        <span class="file-message">or drag and drop file here</span>
                        <input type="file" name="image" class="file-input" accept=".jpg,.jpeg,.png" required>
                    </div>
                    <div id="imagePreview"></div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('show-items') }}"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop


@push('scripts')

<script src="{{ asset('assets/js/image-preview.js') }}"></script>

<script>
    window.onload = (event) => {
        let myAlert = document.querySelector('.toast');
        let bsAlert = new bootstrap.Toast(myAlert);

        setTimeout(function () {
            bsAlert.show();
        }, 5000);
    };
</script>

@endpush
