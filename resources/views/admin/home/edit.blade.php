@extends('admin.layout')

@section('content')



{{-- HEADER --}}
<div class="dashboard-header">

    <div class="dashboard-title">

        <h1>
            Homepage Editor
        </h1>

        <p>
            Quản lý nội dung website chuyên nghiệp
        </p>

    </div>

    <div class="top-badge">
        Admin Panel
    </div>

</div>

{{-- SUCCESS --}}
@if(session('success'))

    <div class="success-alert">
        {{ session('success') }}
    </div>

@endif

{{-- MAIN CARD --}}
<div class="main-card">

    {{-- FORM UPDATE --}}
    <form 
        method="POST"
        action="/admin/homepage/update"
        enctype="multipart/form-data"
    >

        @csrf

        {{-- BASIC INFO --}}
        <h3 class="section-title">
            Basic Information
        </h3>

        <div class="row">

            {{-- TITLE --}}
            <div class="col-md-6 mb-4">

                <label class="custom-label">
                    Website Title
                </label>

                <input 
                    type="text"
                    name="title"
                    class="form-control custom-input"
                    value="{{ $home->title ?? '' }}"
                >

            </div>

            {{-- SUBTITLE --}}
            <div class="col-md-6 mb-4">

                <label class="custom-label">
                    Subtitle
                </label>

                <input 
                    type="text"
                    name="subtitle"
                    class="form-control custom-input"
                    value="{{ $home->subtitle ?? '' }}"
                >

            </div>

        </div>

        {{-- DESCRIPTION --}}
        <div class="mb-5">

            <label class="custom-label">
                Homepage Description
            </label>

            <div class="ckeditor-wrapper">

                <textarea 
                    name="description"
                    id="editor"
                    class="form-control"
                    rows="10"
                >{{ $home->description ?? '' }}</textarea>

            </div>

        </div>

        {{-- IMAGES --}}
        <div class="row align-items-stretch">

            {{-- BANNER --}}
    

            {{-- COMPANY IMAGE --}}
            <div class="col-md-6 mb-4">

                <div class="upload-box">

                    <label class="custom-label">
                        Company Image
                    </label>

                    <input 
                        type="file"
                        name="company_image"
                        class="form-control custom-input"
                    >

                    @if(!empty($home?->company_image))

                        <img 
                            src="{{ url('uploads/' . $home->company_image) }}"
                            class="image-preview mt-3"
                        >

                    @endif

                </div>

            </div>

        </div>

        {{-- BUTTON --}}
        <div class="text-end mt-4">

            <button type="submit" class="save-btn">

                Save Changes

            </button>

        </div>

    </form>



</div>

@endsection


@section('scripts')

<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

<script>

class MyUploadAdapter {

    constructor(loader) {
        this.loader = loader;
    }

    upload() {

        return this.loader.file.then(file => {

            return new Promise((resolve, reject) => {

                const formData = new FormData();

                formData.append('upload', file);

                fetch("{{ route('upload.image') }}", {

                    method: "POST",

                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },

                    body: formData

                })

                .then(response => response.json())

                .then(result => {

                    if (!result.url) {

                        reject('Upload failed');

                        return;
                    }

                    resolve({
                        default: result.url
                    });

                })

                .catch(error => reject(error));

            });

        });

    }

    abort() {}

}

function MyUploadAdapterPlugin(editor) {

    editor.plugins.get('FileRepository').createUploadAdapter = loader => {

        return new MyUploadAdapter(loader);

    };

}

ClassicEditor
.create(document.querySelector('#editor'), {

    extraPlugins: [MyUploadAdapterPlugin],

    toolbar: [
        'heading',
        '|',
        'bold',
        'italic',
        'bulletedList',
        'numberedList',
        '|',
        'link',
        'uploadImage',
        'insertTable',
        'blockQuote',
        '|',
        'undo',
        'redo'
    ],

    image: {
        toolbar: [
            'imageTextAlternative',
            '|',
            'imageStyle:inline',
            'imageStyle:block',
            'imageStyle:side'
        ]
    }

})

.catch(error => {
    console.error(error);
});

</script>

@endsection