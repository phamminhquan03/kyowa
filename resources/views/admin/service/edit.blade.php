@extends('admin.layout')

@section('content')

<div class="main-card">

    {{-- HEADER --}}
    <div class="dashboard-header">

        <div class="dashboard-title">
            <h1>Sửa dịch vụ</h1>
            <p>Cập nhật thông tin dịch vụ</p>
        </div>

        <div class="top-badge">
            Edit ID: {{ $service->id }}
        </div>

    </div>

    {{-- FORM --}}
    <form method="POST" action="/admin/service/update/{{ $service->id }}" enctype="multipart/form-data">

        @csrf

        {{-- TITLE --}}
        <div class="mb-4">

            <label class="custom-label">Title</label>

            <input 
                type="text"
                name="title"
                class="form-control custom-input"
                value="{{ $service->title }}"
            >

        </div>

        {{-- DESCRIPTION --}}
        <div class="mb-4">

            <label class="custom-label">Description</label>

            <div class="ckeditor-wrapper">

                <textarea 
                    name="description"
                    id="editor"
                    rows="10"
                >{{ $service->description ?? '' }}</textarea>

            </div>

        </div>

        {{-- IMAGE --}}
        <div class="mb-4">

            <label class="custom-label">Image</label>

            <div class="upload-box">

                <input 
                    type="file"
                    name="image"
                    class="form-control custom-input"
                >

                {{-- CURRENT IMAGE --}}
                @if(!empty($service->image))

                  <img 
    src="{{ url('uploads/' . $service->image) }}"
    class="image-preview mt-3"
    style="height: 180px; max-width: 300px; object-fit: cover;"
>
                @endif

            </div>

        </div>

        {{-- BUTTON --}}
        <div class="text-end">

            <button type="submit" class="save-btn">
                Cập nhật
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
                .then(res => res.json())
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
        'heading','|',
        'bold','italic','bulletedList','numberedList','|',
        'link','uploadImage','insertTable','blockQuote','|',
        'undo','redo'
    ],

    image: {
        toolbar: [
            'imageTextAlternative','|',
            'imageStyle:inline',
            'imageStyle:block',
            'imageStyle:side'
        ]
    }

})
.catch(error => console.error(error));
</script>

@endsection