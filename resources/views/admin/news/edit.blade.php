@extends('admin.layout')

@section('content')

<div class="main-card">

    <div class="dashboard-header">

        <div class="dashboard-title">
            <h1>Chỉnh sửa tin tức</h1>
            <p>Cập nhật thông tin bài viết</p>
        </div>

        <div class="top-badge">
            News Edit
        </div>

    </div>

    <form
        method="POST"
        action="/admin/news/update/{{ $news->id }}"
        enctype="multipart/form-data"
    >

        @csrf


        {{-- TITLE --}}
        <div class="mb-4">

            <label class="custom-label">
                Tiêu đề
            </label>

            <input
                type="text"
                name="title"
                class="form-control custom-input"
                value="{{ old('title', $news->title) }}"
            >

            @error('title')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror

        </div>

        {{-- DESCRIPTION --}}
        <div class="mb-4">

            <label class="custom-label">
                Nội dung
            </label>

            <div class="ckeditor-wrapper">

                <textarea
                    name="description"
                    id="editor"
                    rows="10"
                >{{ old('description', $news->description) }}</textarea>

            </div>

            @error('description')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror

        </div>

        {{-- IMAGE --}}
        <div class="mb-4">

            <label class="custom-label">
                Ảnh hiện tại
            </label>

            <div class="mb-3">

                <img
                    src="{{ url('uploads/' . $news->image) }}"
                    class="preview-image"
                    alt=""
                >

            </div>

        </div>

        <div class="mb-4">

            <label class="custom-label">
                Đổi ảnh mới
            </label>

            <div class="upload-box">

                <input
                    type="file"
                    name="image"
                    class="form-control custom-input"
                >

            </div>

            @error('image')
                <small class="text-danger">
                    {{ $message }}
                </small>
            @enderror

        </div>

        {{-- BUTTON --}}
        <div class="d-flex justify-content-end gap-2">

            <a
                href="/admin/news"
                class="btn-back"
            >
                Quay lại
            </a>

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
    ]

})
.catch(error => {
    console.error(error);
});

</script>

@endsection