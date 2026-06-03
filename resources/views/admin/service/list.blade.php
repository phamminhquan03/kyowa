@extends('admin.layout')

@section('content')

<div class="main-card">

    <div class="dashboard-header">

        <div class="dashboard-title">
            <h1>Danh sách dịch vụ</h1>
            <p>Quản lý toàn bộ dịch vụ</p>
        </div>

        <div class="top-badge">
            {{ $services->total() }} dịch vụ
        </div>

    </div>

    <div class="mb-4">
        <a href="/admin/service/create" class="save-btn">
            + Thêm dịch vụ
        </a>
    </div>

    <div class="table-responsive">

        <table class="table admin-table">

            <thead>
                <tr>
                    <th width="80">ID</th>
                    <th width="150">Ảnh</th>
                    <th>Tên dịch vụ</th>
                    <th width="220">Thao tác</th>
                </tr>
            </thead>

            <tbody>

                @forelse($services as $service)

                <tr>

                    <td class="text-center">
                        {{ ($services->currentPage() - 1) * $services->perPage() + $loop->iteration }}
                    </td>

                    <td class="text-center">
                        <img
                            src="{{ url('uploads/' . $service->image) }}"
                            class="table-image"
                            alt=""
                        >
                    </td>

                    <td>
                        <strong>{{ $service->title }}</strong>
                    </td>

                    <td class="text-center">

                        <div class="d-flex justify-content-center gap-2">

                            <a
                                href="/admin/service/edit/{{ $service->id }}"
                                class="btn-edit"
                            >
                                Sửa
                            </a>

                            <form
                                action="/admin/service/delete/{{ $service->id }}"
                                method="POST"
                                class="d-inline"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-delete"
                                    onclick="return confirm('Xóa dịch vụ?')"
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
                        Chưa có dịch vụ nào
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    {{-- Phân trang --}}
   <div class="mt-4 d-flex justify-content-between align-items-center">

    <small class="text-muted">
        Hiển thị {{ $services->firstItem() ?? 0 }}
        - {{ $services->lastItem() ?? 0 }}
        trên tổng {{ $services->total() }} dịch vụ
    </small>

    {{ $services->links() }}

</div>

</div>

@endsection