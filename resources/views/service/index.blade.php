@extends('layouts.app')

@section('content')

<style>
    .services-section {
        background: #f8f9fa;
      
    }

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

    .service-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        transition: all 0.4s ease;
        height: 100%;
    }

    .service-card:hover {
        transform: translateY(-15px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }

    .service-card img {
        height: 260px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .service-card:hover img {
        transform: scale(1.08);
    }

    .service-body {
        padding: 28px;
        background: #fff;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .service-body h5 {
        font-weight: 700;
        font-size: 1.35rem;
        margin-bottom: 14px;
        line-height: 1.4;
    }

    .service-body p {
        color: #64748b;
        line-height: 1.7;
        flex-grow: 1;
    }

    .btn-service {
        margin-top: auto;
        align-self: start;
    }
</style>

<!-- DỊCH VỤ -->
<section class="services-section">
    <div class="container">

        <div class="text-center mb-5">
            <h1 class="section-title">Dịch Vụ Của Chúng Tôi</h1>
            <p class="text-muted mt-3 fs-5">
                Giải pháp vệ sinh công nghiệp toàn diện - chuyên nghiệp - uy tín
            </p>
        </div>

        <div class="row g-4">

            @foreach($services as $service)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-card h-100">

                        <!-- Ảnh -->
                        <a href="{{ route('services.show', $service->slug) }}">
                            <img src="{{ url('uploads/' . $service->image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $service->title }}">
                        </a>

                        <!-- Nội dung -->
                        <div class="service-body d-flex flex-column">
                            <h5>
                                <a href="{{ route('services.show', $service->slug) }}" 
                                   class="text-decoration-none text-dark">
                                    {{ $service->title }}
                                </a>
                            </h5>

                            @if(!empty($service->subtitle))
                                <p class="mb-4">
                                    {{ Str::limit($service->subtitle, 120) }}
                                </p>
                            @endif

                            <a href="{{ route('services.show', $service->slug) }}" 
                               class="btn btn-outline-success btn-sm btn-service">
                                Xem chi tiết →
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>

@endsection