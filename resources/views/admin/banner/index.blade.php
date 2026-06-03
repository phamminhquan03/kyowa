@extends('admin.layout')

@section('content')

<div class="main-card">

    {{-- TITLE --}}
    <h3 class="banner-title">
        Banner Manager
    </h3>

    {{-- SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORM UPLOAD --}}
    <form action="/admin/banner/store" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">

            <label class="form-label fw-bold">
                Upload Banner (Max 3 images)
            </label>

            <input 
                type="file"
                name="banners[]"
                class="form-control"
                multiple
            >

        </div>

        <button class="btn btn-primary">
            Upload
        </button>

    </form>

    {{-- LIST BANNER --}}
    <div class="row mt-5">

        @foreach($banners as $banner)

            <div class="col-md-4 mb-4">

                <div class="position-relative">

                    <img 
                        src="{{ url('uploads/' . $banner->image) }}"
                        class="image-preview"
                    >

                    {{-- DELETE --}}
                    <form 
                        action="/admin/banner/delete/{{ $banner->id }}"
                        method="POST"
                        class="position-absolute top-0 end-0 m-2"
                    >
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Xóa
                        </button>

                    </form>

                </div>

            </div>

        @endforeach

    </div>

</div>

@endsection