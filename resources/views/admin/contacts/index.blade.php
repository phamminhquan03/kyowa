@extends('admin.layout')

@section('content')

    <div class="main-card">

        <div class="dashboard-header">

            <div class="dashboard-title">
                <h1>Danh sách liên hệ</h1>
                <p>Quản lý các liên hệ từ khách hàng</p>
            </div>

            <div class="top-badge">
                {{ $contacts->total() }} liên hệ
            </div>

        </div>

        @if(session('success'))

            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>

        @endif

        <div class="table-responsive">

            <table class="table admin-table">

                <thead>

                    <tr>

                        <th width="80">ID</th>

                        <th>Họ tên</th>

                        <th width="140">SĐT</th>

                        <th>Email</th>

                        <th>Tiêu đề</th>

                        <th width="180">Ngày gửi</th>
                        <th width="140">Trạng thái</th>

                        <th width="220">Thao tác</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($contacts as $item)

                        <tr>

                            <td class="text-center">
                                {{ $item->id }}
                            </td>

                            <td>
                                <strong>{{ $item->name }}</strong>
                            </td>

                            <td>
                                {{ $item->phone }}
                            </td>

                            <td>
                                {{ $item->email }}
                            </td>

                            <td>
                                {{ $item->subject }}
                            </td>

                            <td class="text-center">
                                {{ $item->created_at->format('d/m/Y H:i') }}
                            </td>
<td class="text-center">

    @if($item->is_replied)

        <span class="badge bg-success">
            Đã phản hồi
        </span>

    @else

        <span class="badge bg-warning text-dark">
            Chưa phản hồi
        </span>

    @endif

</td>
                            <td>

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="/admin/contacts/{{ $item->id }}" class="btn-edit">
                                        Xem
                                    </a>

                                    <form action="/admin/delete/contacts/{{ $item->id }}" method="POST" class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-delete" onclick="return confirm('Xóa liên hệ này?')">
                                            Xóa
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center py-4">
                                Chưa có liên hệ nào
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-4 d-flex justify-content-end">
            {{ $contacts->links() }}
        </div>

    </div>

@endsection