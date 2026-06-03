@extends('admin.layout')

@section('content')

<div class="main-card">

    <div class="dashboard-header">

        <div class="dashboard-title">
            <h1>Chi tiết liên hệ</h1>
            <p>Thông tin khách hàng gửi từ website</p>
        </div>

        <a href="/admin/contacts" class="btn-back">
            ← Quay lại
        </a>

    </div>

    <div class="detail-card">

        <div class="detail-row">
            <div class="detail-label">Họ tên</div>
            <div class="detail-value">
                {{ $contact->name }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Số điện thoại</div>
            <div class="detail-value">
                {{ $contact->phone }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Email</div>
            <div class="detail-value">
                {{ $contact->email }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Địa chỉ</div>
            <div class="detail-value">
                {{ $contact->address ?: 'Không có' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Tiêu đề</div>
            <div class="detail-value">
                {{ $contact->subject }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Ngày gửi</div>
            <div class="detail-value">
                {{ $contact->created_at->format('d/m/Y H:i') }}
            </div>
        </div>

        <div class="detail-row align-items-start">
            <div class="detail-label">Nội dung</div>

            <div class="detail-value">
                <div class="message-box">
                    {{ $contact->message }}
                </div>
            </div>
        </div>

     </div>

    {{-- FORM PHẢN HỒI --}}
    <div class="reply-card mt-4">

        <h4 class="mb-4">
            Phản hồi khách hàng
        </h4>
<div class="reply-card mt-4">

    <h4 class="mb-4">
        Phản hồi khách hàng
    </h4>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4">
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert">
            </button>
        </div>
    @endif
        <form
            action="/admin/contacts/send-reply/{{ $contact->id }}"
            method="POST"
        >

            @csrf

            <div class="mb-3">

                <label class="custom-label">
                    Tiêu đề email
                </label>

                <input
                    type="text"
                    name="subject"
                    class="form-control custom-input"
                    placeholder="Nhập tiêu đề email..."
                    required
                >

            </div>

            <div class="mb-4">

                <label class="custom-label">
                    Nội dung phản hồi
                </label>

                <textarea
                    name="message"
                    rows="8"
                    class="form-control custom-input"
                    placeholder="Nhập nội dung phản hồi..."
                    required
                ></textarea>

            </div>

            <div class="text-end">

                <button type="submit" class="save-btn">
                    ✉ Gửi phản hồi
                </button>

            </div>

        </form>

    </div>

</div>

@endsection