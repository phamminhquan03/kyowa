@extends('layouts.app')

@section('content')

<style>
    .news-section {
        background: #f8f9fa;
     
    }

    .section-title {
        position: relative;
        display: inline-block;
        font-size: 2.8rem;
        font-weight: 800;
        color: #1e293b;
    }

    .section-title:after {
        content: '';
        position: absolute;
        width: 80px;
        height: 4px;
        background: #16a34a;
        bottom: -12px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 2px;
    }

    .news-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        transition: all 0.4s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .news-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    }

    .news-image {
        position: relative;
        height: 260px;
    }

    .news-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .news-card:hover .news-image img {
        transform: scale(1.08);
    }

    .news-content {
        padding: 28px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .news-content h3 {
        font-size: 1.35rem;
        line-height: 1.4;
        margin-bottom: 16px;
        font-weight: 700;
    }

    .news-content h3 a {
        text-decoration: none;
        color: #1e293b;
        transition: color 0.3s;
    }

    .news-content h3 a:hover {
        color: #16a34a;
    }

    .news-desc {
        color: #64748b;
        line-height: 1.7;
        margin-bottom: 20px;
        flex-grow: 1;
    }

    .news-date {
        color: #16a34a;
        font-weight: 600;
        font-size: 0.95rem;
    }

    .btn-readmore {
        margin-top: auto;
        align-self: start;
    }

    @media (max-width: 768px) {
        .news-image {
            height: 220px;
        }
        .section-title {
            font-size: 2.2rem;
        }
    }
</style>

<div class="news-section">
    <div class="container">

        <div class="text-center mb-5">
            <h1 class="section-title">Tin Tức Nổi Bật</h1>
            <p class="text-muted mt-3 fs-5">Cập nhật những thông tin mới nhất từ Kyowa</p>
        </div>

        <div class="row g-4">

            @foreach($news as $item)
                <div class="col-lg-6 col-md-12">
                    <div class="news-card">

                        <!-- Ảnh -->
                        <div class="news-image">
                            <img src="{{ url('uploads/' . $item->image) }}" 
                                 alt="{{ $item->title }}">
                        </div>

                        <!-- Nội dung -->
                        <div class="news-content">
                            <h3>
                                <a <a href="{{ route('news.show',$item->slug) }}">>
                                    {{ $item->title }}
                                </a>
                            </h3>

                            <div class="news-desc">
                                {!! Str::limit(strip_tags($item->description), 180) !!}
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="news-date">
                                    🏷 {{ $item->created_at->format('d/m/Y') }}
                                </div>
                                <a href="{{ route('news.show',$item->slug) }}" 
                                   class="btn btn-outline-success btn-sm btn-readmore">
                                    Đọc thêm →
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

        @if($news->count() > 4)
            <div class="text-center mt-5">
                <a href="/tin-tuc" class="btn btn-success btn-lg px-5">Xem tất cả tin tức</a>
            </div>
        @endif

    </div>
</div>

@endsection