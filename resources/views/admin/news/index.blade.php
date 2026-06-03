@extends('admin.layout')

@section('content')

<div class="main-card">

    <div class="dashboard-header">

        <div class="dashboard-title">
            <h1>Danh sách tin tức</h1>
            <p>Quản lý bài viết website</p>
        </div>

        <div class="top-badge">
            {{ $news->total() }} bài viết
        </div>

    </div>

    <div class="mb-4">
        <a href="/admin/news/create" class="save-btn">
            + Thêm tin tức
        </a>
    </div>

    <div class="table-responsive">

        <table class="table admin-table">

            <thead>
                <tr>
                    <th width="80">ID</th>
                    <th width="150">Ảnh</th>
                    <th>Tiêu đề</th>
                    <th width="220">Thao tác</th>
                </tr>
            </thead>

            <tbody>

                @forelse($news as $item)

                <tr>

                  <td class="text-center">
    {{ ($news->currentPage() - 1) * $news->perPage() + $loop->iteration }}
</td>

                    <td class="text-center">
                        <img
                            src="{{ url('uploads/' . $item->image) }}"
                            class="table-image"
                            alt=""
                        >
                    </td>

                    <td>
                        <strong>{{ $item->title }}</strong>
                    </td>

                    <td class="text-center">

                        <div class="d-flex justify-content-center gap-2">

                            <a
                                href="/admin/news/edit/{{ $item->id }}"
                                class="btn-edit"
                            >
                                Sửa
                            </a>

                            <form
                                action="/admin/news/delete/{{ $item->id }}"
                                method="POST"
                                class="d-inline"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-delete"
                                    onclick="return confirm('Xóa tin tức?')"
                                >
                                    Xóa
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="4" class="text-center py-4">
                        Chưa có bài viết nào
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Phân trang --}}
   <div class="mt-4 d-flex justify-content-between align-items-center">

    <small class="text-muted">
        Hiển thị {{ $news->firstItem() ?? 0 }}
        - {{ $news->lastItem() ?? 0 }}
        trên tổng {{ $news->total() }} bài viết
    </small>

    {{ $news->links() }}

</div>

</div>

@endsection