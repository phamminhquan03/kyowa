@extends('layouts.app')

@section('content')
<style>
       .section-title {
        font-size: 2.8rem;
        font-weight: 800;
        color: #1e293b;
        position: relative;
        display: inline-block;
    }

    .section-title:after {
        content: '';
        position: absolute;
        width: 70px;
        height: 4px;
        background: #198754;
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
    }
</style>
<section class="py-3">
    <div class="container">

        <!-- Tiêu đề -->
        <div class="text-center mb-5 ">
            <h1 class="section-title">Liên hệ</h1>
          
        </div>

        <div class="row g-5">

            <!-- Cột trái: Thông tin liên hệ -->
            <div class="col-lg-5">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body p-5">
                        <h4 class="fw-bold text-success mb-4">
                            <i class="bi bi-info-circle-fill me-2"></i>Thông Tin Liên Hệ
                        </h4>
                        
                        <div class="d-flex mb-4">
                            <i class="bi bi-geo-alt-fill text-success fs-4 me-3 mt-1"></i>
                            <div>
                                <strong>Địa chỉ:</strong><br>
                                80A/7/14 Nguyễn Duy Trinh KP4,<br>
                                P. Phú Hữu, Quận 9, TP. Hồ Chí Minh
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <i class="bi bi-telephone-fill text-success fs-4 me-3 mt-1"></i>
                            <div>
                                <strong>Hotline / Zalo:</strong><br>
                                0987.654.321 - 0987.654.321
                            </div>
                        </div>

                        <div class="d-flex mb-4">
                            <i class="bi bi-envelope-fill text-success fs-4 me-3 mt-1"></i>
                            <div>
                                <strong>Email:</strong><br>
                                thanbinhcleaning@gmail.com
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cột phải: Form -->
            <div class="col-lg-7">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-5">
                        <h4 class="fw-bold mb-4">Gửi tin nhắn cho chúng tôi</h4>

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <div class="row g-4">
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Họ và tên *" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="phone" class="form-control form-control-lg" placeholder="Số điện thoại *" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="address" class="form-control form-control-lg" placeholder="Địa chỉ">
                                </div>
                                <div class="col-12">
                                    <input type="text" name="subject" class="form-control form-control-lg" placeholder="Tiêu đề *" required>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" rows="7" class="form-control form-control-lg" placeholder="Nội dung tin nhắn *" required></textarea>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success btn-lg px-5">Gửi Liên Hệ</button>
                                <button type="reset" class="btn btn-outline-secondary btn-lg px-5 ms-3">Làm Mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bản đồ -->
        <div class="mt-5">
            <h4 class="fw-bold mb-3">Vị Trí Công Ty</h4>
            <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.5!2d106.7!3d10.8!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zQ8O0bmcgVHkgVHLhuq1uaCBCw6xuaA!5e0!3m2!1svi!2s!4v1700000000000" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

    </div>
</section>

@endsection