@extends('layouts.app')

@section('content')

<style>
    .about-section {
        /* Tăng padding-top */
        background: #fff;
    }

    .section-title {
        font-size: 46px;
        font-weight: 800;
        color: #0f172a;
        position: relative;
        display: inline-block;
        margin-bottom: 60px;     /* Tăng khoảng cách dưới tiêu đề */
        line-height: 1.3;
    }

    .section-title::after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: -14px;
        transform: translateX(-50%);
        width: 90px;
        height: 5px;
        background: #16a34a;
        border-radius: 30px;
    }

    .about-content {
        font-size: 20px;
        line-height: 2;
        color: #475569;
        text-align: justify;
    }

    .about-content p {
        margin-bottom: 28px;
    }

    .about-content h1,
    .about-content h2,
    .about-content h3,
    .about-content h4 {
        color: #0f172a;
        font-weight: 700;
        margin-top: 45px;
        margin-bottom: 22px;
    }

    .about-content img {
        max-width: 100%;
        height: auto;
        border-radius: 18px;
        margin: 35px 0;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }

    @media (max-width: 768px) {
        .section-title {
            font-size: 34px;
            margin-bottom: 40px;
        }
        .about-section {
            padding: 80px 0 60px;
        }
    }
</style>

<section class="about-section">
    <div class="container">

        <!-- Tiêu đề (đã dịch lên trên) -->
        <div class="text-center">
            <h1 class="section-title">
                {{ $home?->subtitle ?? 'Giới Thiệu Về Kyowa' }}
            </h1>
        </div>

        <!-- Nội dung -->
        <div class="about-content">
            {!! $home?->description !!}
        </div>

    </div>
</section>

@endsection