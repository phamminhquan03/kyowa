@extends('layouts.app')

@section('content')
<style>
    /* Đồng đều kích thước ảnh */
    .banner-img{
    width:100%;
    height:clamp(200px, 45vw, 700px);
    object-fit:cover;
}
.news-img-wrapper {
    width: 100%;
    height: 105px;           /* Bạn có thể chỉnh chiều cao ảnh ở đây */
    overflow: hidden;
    border-radius: 10px;
    background: #f1f1f1;
}

.news-img {
    width: 100%;
    height: 100%;
    object-fit: cover;       /* Cắt ảnh vừa khung, không bị méo */
    transition: transform 0.4s ease;
}

.news-item:hover .news-img {
    transform: scale(1.08);
}
    .news-scroll-container {
    height: 460px;
    overflow: hidden;
    position: relative;
    background: #f8f9fa;
    border-radius: 12px;
    padding: 10px;
}

.hide-scrollbar::-webkit-scrollbar {
    display: none;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
    .service-card {
    transition: all 0.4s ease;
    border: none;
}

.service-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12) !important;
}

.service-card .card-img-top {
    transition: transform 0.5s ease;
}

.service-card:hover .card-img-top {
    transform: scale(1.08);
}

.card-body {
    background: #fff;
}
    .why-choose-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.4s ease;
}

.why-choose-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
}

.icon-wrapper {
    width: 90px;
    height: 90px;
    margin: 0 auto;
    background: #f8f9fa;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 42px;
    transition: all 0.4s;
}

.why-choose-card:hover .icon-wrapper {
    background: #198754;
    color: white;
    transform: scale(1.1);
}
.news-scroll-container {
    height: 520px;
    overflow: hidden;
    position: relative;
}

.news-scroll {
    position: absolute;
    width: 100%;
    animation: scrollInfinite 35s linear infinite;
}

.news-scroll:hover {
    animation-play-state: paused;
}

@keyframes scrollInfinite {
    0% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(-50%);
    }
}

.news-item {
    padding: 8px 0;
    transition: all 0.3s;
}

.news-item:hover {
    background: #f8f9fa;
    border-radius: 10px;
    padding-left: 10px;
}
    .news-card {
    border-radius: 14px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.news-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.12);
}

/* IMAGE ZOOM EFFECT */
.news-img {
    overflow: hidden;
}

.news-img img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    transition: 0.4s ease;
}

.news-card:hover .news-img img {
    transform: scale(1.08);
}

/* TITLE FIX */
.news-title {
    font-size: 16px;
    line-height: 1.4;
    min-height: 44px;
}

/* DESCRIPTION clamp */
.news-desc {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    font-size: 14px;
}
</style>
    @php
        use Illuminate\Support\Str;
    @endphp
    <!-- Banner -->
    @if($banners->count() > 0)

     <div id="homeBanner"
     class="carousel slide"
     data-bs-ride="carousel"
     data-bs-interval="4000">

    {{-- Dots --}}
    <div class="carousel-indicators">
        @foreach($banners as $key => $banner)
            <button type="button"
                    data-bs-target="#homeBanner"
                    data-bs-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}">
            </button>
        @endforeach
    </div>

    {{-- Slides --}}
    <div class="carousel-inner">

        @foreach($banners as $key => $banner)

            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">

                <img
                    src="{{ url('uploads/' . $banner->image) }}"
                    class="d-block w-100 banner-img"
                    alt="Banner">

            </div>

        @endforeach

    </div>

    {{-- Arrows --}}
    <button class="carousel-control-prev"
            type="button"
            data-bs-target="#homeBanner"
            data-bs-slide="prev">

        <span class="carousel-control-prev-icon"></span>

    </button>

    <button class="carousel-control-next"
            type="button"
            data-bs-target="#homeBanner"
            data-bs-slide="next">

        <span class="carousel-control-next-icon"></span>

    </button>

</div>

    @endif

    <!-- Nội dung trang chủ -->
    <div class="container my-5">

        {{-- TITLE --}}
        <h1 class="text-center fw-bold mb-5">
            {{ $home?->title }}
        </h1>

        {{-- GIỚI THIỆU --}}
        <div class="row align-items-stretch g-5">

            {{-- ẢNH --}}
            <div class="col-md-6">

                @if(!empty($home?->company_image))

                    <img src="{{ url('uploads/' . $home->company_image) }}" class="img-fluid rounded shadow w-100 h-100"
                        style="object-fit: cover; min-height: 450px;" alt="">

                @endif

            </div>

            {{-- NỘI DUNG --}}
            <div class="col-md-6 d-flex">

                <div class="d-flex flex-column justify-content-center h-100">

                    <h3 class="text-muted mb-4 fw-bold">
                        {{ $home?->subtitle }}
                    </h3>

                    <div class="text-muted overflow-hidden" style="
                        line-height: 32px;
                        max-height: 160px;
                    ">
                        {!! $home->description !!}
                    </div>
                    {{-- BUTTON --}}
                    <a href="/gioi-thieu" class="btn btn-primary mt-3 px-4 py-2 align-self-start">
                        Xem thêm
                    </a>

                </div>

            </div>

        </div>

        {{-- DỊCH VỤ --}}
  <!-- DỊCH VỤ NỔI BẬT -->
<section class="py-5">
    <div class="container">
        
        <div class="text-center mb-5">
            <h1 class="fw-bold text-success mb-3">Dịch Vụ Nổi Bật</h1>
            <p class="text-muted fs-5">
                Chúng tôi cung cấp các giải pháp vệ sinh công nghiệp toàn diện
            </p>
        </div>

        <div id="serviceCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4500">
            
            <div class="carousel-inner">

                @php
                    $servicesChunk = $services->chunk(4); 
                @endphp

                @foreach($servicesChunk as $index => $chunk)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        
                        <div class="row g-4">
                            
                            @foreach($chunk as $service)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                    <div class="service-card card border-0 shadow h-100 rounded-4 overflow-hidden">
                                        
                                        <!-- Ảnh -->
                                        <a href="{{ url('/service/' . $service->id) }}" class="d-block">
                                            <img src="{{ url('uploads/' . $service->image) }}" 
                                                 class="card-img-top" 
                                                 style="height: 240px; object-fit: cover;" 
                                                 alt="{{ $service->title }}">
                                        </a>

                                        <!-- Nội dung -->
                                        <div class="card-body d-flex flex-column p-4">
                                            <h5 class="fw-bold text-center mb-3">
                                                <a href="{{ url('/service/' . $service->id) }}" 
                                                   class="text-decoration-none text-dark">
                                                    {{ $service->title }}
                                                </a>
                                            </h5>
                                            
                                            @if(!empty($service->short_description))
                                                <p class="text-muted text-center small flex-grow-1">
                                                    {{ Str::limit(strip_tags($service->short_description), 85) }}
                                                </p>
                                            @endif

                                            <a href="{{ url('/service/' . $service->id) }}" 
                                               class="btn btn-outline-success btn-sm mt-auto">
                                                Chi tiết →
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Nút điều khiển -->
            <button class="carousel-control-prev" type="button" data-bs-target="#serviceCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#serviceCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>

        <!-- Nút xem tất cả -->
        <div class="text-center mt-5">
            <a href="{{ url('/dich-vu') }}" class="btn btn-success btn-lg px-5">
                Xem tất cả dịch vụ
            </a>
        </div>

    </div>
</section>
        {{-- TITLE --}}
     

            {{-- LỚP MỜ --}}


        <!-- VÌ SAO CHỌN CHÚNG TÔI -->
<div class="py-5 bg-light">
    <div class="container">
        
        <div class="text-center mb-5">
            <h1 class="fw-bold text-uppercase" style="font-size: 42px; color: #198754;">
                Vì Sao Chọn Kyowa?
            </h1>
            <p class="text-muted fs-5 mt-3">
                Chuyên cung cấp dịch vụ vệ sinh công nghiệp uy tín - chuyên nghiệp - hiệu quả
            </p>
        </div>

        <div class="row g-4">

            <!-- Item 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="why-choose-card text-center h-100 p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="bi bi-shield-check text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-3">UY TÍN & CHẤT LƯỢNG</h5>
                    <p class="text-muted">
                        Cam kết tiến độ đúng hẹn, chất lượng vượt trội và minh bạch tuyệt đối.
                    </p>
                </div>
            </div>

            <!-- Item 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="why-choose-card text-center h-100 p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="bi bi-clock-history text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-3">THI CÔNG NHANH CHÓNG</h5>
                    <p class="text-muted">
                        Đội ngũ nhân viên chuyên nghiệp, giàu kinh nghiệm, xử lý nhanh hiệu quả.
                    </p>
                </div>
            </div>

            <!-- Item 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="why-choose-card text-center h-100 p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="bi bi-currency-dollar text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-3">GIÁ CẢ CẠNH TRANH</h5>
                    <p class="text-muted">
                        Chi phí hợp lý, phù hợp với mọi quy mô từ nhỏ đến lớn.
                    </p>
                </div>
            </div>

            <!-- Item 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="why-choose-card text-center h-100 p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="bi bi-check-circle text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-3">ĐẢM BẢO TIẾN ĐỘ</h5>
                    <p class="text-muted">
                        Luôn hoàn thành đúng thời gian cam kết với khách hàng.
                    </p>
                </div>
            </div>

            <!-- Item 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="why-choose-card text-center h-100 p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="bi bi-lightbulb text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-3">GIẢI PHÁP TỐI ƯU</h5>
                    <p class="text-muted">
                        Áp dụng công nghệ và phương pháp vệ sinh hiện đại nhất.
                    </p>
                </div>
            </div>

            <!-- Item 6 -->
            <div class="col-lg-4 col-md-6">
                <div class="why-choose-card text-center h-100 p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="bi bi-emoji-smile text-success"></i>
                    </div>
                    <h5 class="fw-bold mb-3">HÀI LÒNG KHÁCH HÀNG</h5>
                    <p class="text-muted">
                        Mang đến trải nghiệm dịch vụ tốt nhất và sự hài lòng tuyệt đối.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>



        </div>

        {{-- NEWS --}}

<!-- HÌNH ẢNH & TIN TỨC -->
<section class="py-5 bg-white">
    <div class="container">
        
        <div class="text-center mb-5">
            <h1 class="fw-bold text-success mb-3">HÌNH ẢNH & TIN TỨC</h1>
            <p class="text-muted fs-5">
                Cập nhật những hình ảnh hoạt động và tin tức mới nhất từ Kyowa
            </p>
        </div>

        <div class="row g-5 align-items-start">

            <!-- Phần trái: Ảnh lớn + Gallery -->
           <div class="row g-5">

    <!-- Cột trái: Ảnh lớn -->
    <div class="col-lg-7">
        <div class="position-relative h-100 shadow-sm rounded-4 overflow-hidden">
            <img src="https://picsum.photos/id/1015/800/460" 
                 class="img-fluid w-100 h-100" 
                 style="object-fit: cover;" 
                 alt="Hoạt động vệ sinh">
            
            <div class="position-absolute bottom-0 start-0 end-0 bg-gradient p-4 text-white">
                <h5 class="mb-1">Hoạt động vệ sinh công nghiệp quy mô lớn</h5>
            </div>
        </div>
    </div>

    <!-- Cột phải: Tin tức cuộn -->
   <div class="col-lg-5">
    <h4 class="mb-4 fw-bold text-dark">Tin tức mới nhất</h4>
    
    <div class="news-scroll-container">
        <div class="news-scroll">
            
            @foreach($news as $item)
                <div class="news-item">
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="news-img-wrapper">
                                <img src="{{ url('uploads/' . $item->image) }}" 
                                     class="news-img" 
                                     alt="{{ $item->title }}">
                            </div>
                        </div>
                        <div class="col-8">
                            <small class="text-muted">{{ $item->created_at->format('d/m/Y') }}</small>
                            <h6 class="fw-bold mt-1 mb-2 line-clamp-2">
                                <a href="/news/{{ $item->id }}" class="text-decoration-none text-dark">
                                    {{ Str::limit($item->title, 75) }}
                                </a>
                            </h6>
                            <p class="text-muted small mb-0 line-clamp-2">
                                {{ Str::limit(strip_tags($item->description), 90) }}
                            </p>
                        </div>
                    </div>
                    <hr class="my-3">
                </div>
            @endforeach

            <!-- Duplicate để cuộn vòng lặp -->
            @foreach($news as $item)
                <div class="news-item">
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="news-img-wrapper">
                                <img src="{{ url('uploads/' . $item->image) }}" 
                                     class="news-img" 
                                     alt="{{ $item->title }}">
                            </div>
                        </div>
                        <div class="col-8">
                            <small class="text-muted">{{ $item->created_at->format('d/m/Y') }}</small>
                            <h6 class="fw-bold mt-1 mb-2 line-clamp-2">
                                <a href="/news/{{ $item->id }}" class="text-decoration-none text-dark">
                                    {{ Str::limit($item->title, 75) }}
                                </a>
                            </h6>
                            <p class="text-muted small mb-0 line-clamp-2">
                                {{ Str::limit(strip_tags($item->description), 90) }}
                            </p>
                        </div>
                    </div>
                    <hr class="my-3">
                </div>
            @endforeach

        </div>
    </div>
</div>

</div>


        </div>
    </div>
</section>

    </div>


    <!-- Dịch vụ -->

@endsection
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>