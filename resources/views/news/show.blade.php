```php
@extends('layouts.app')

@section('content')

<style>
 

    .news-title {
        font-size: 42px;
        font-weight: 800;
        line-height: 1.4;
        color: #111;
        margin-bottom: 25px;
    }

    .news-meta {
        color: #777;
        font-size: 15px;
        margin-bottom: 35px;
    }

    .news-thumbnail img {
        width: 100%;
        max-height: 550px;
        object-fit: cover;
        border-radius: 18px;
    }

    .news-content {
        margin-top: 45px;
        font-size: 20px;
        line-height: 1.95;
        color: #333;
        text-align: justify;
    }

    .news-content p {
        margin-bottom: 28px;
    }

    .news-content img {
        max-width: 100%;
        height: auto;
        border-radius: 16px;
        margin: 30px 0;
    }

    .news-content h1,
    .news-content h2,
    .news-content h3,
    .news-content h4 {
        margin-top: 40px;
        margin-bottom: 20px;
        font-weight: 700;
        color: #111;
    }

    .back-news-btn {
        margin-top: 60px;
    }

    .back-news-btn a {
        padding: 14px 35px;
        border-radius: 12px;
        font-weight: 600;
    }

    @media (max-width: 768px) {

        .news-title {
            font-size: 30px;
        }

        .news-content {
            font-size: 17px;
        }

        .news-detail {
            padding: 50px 0;
        }
    }
</style>

<section class="news-detail">

    <div class="container">

        <!-- Header -->
        <div class="mb-5">
 <h1 class=" text-center ">
                TIN TỨC
            </h1>
            <h1 class="news-title">
                {{ $news->title }}
            </h1>

            <div class="news-meta">
                <i class="bi bi-calendar3 me-2"></i>
                Ngày đăng:
                {{ $news->created_at->format('d/m/Y') }}
            </div>

        </div>

        <!-- Ảnh -->
        <div class="news-thumbnail shadow-sm overflow-hidden">
            <img src="{{ url('uploads/' . $news->image) }}"
                 alt="{{ $news->title }}">
        </div>

        <!-- Nội dung -->
        <div class="news-content">

            {!! $news->description !!}

        </div>

        <!-- Nút quay lại -->
        <div class="back-news-btn text-center">

            <a href="{{ url('/tin-tuc') }}"
               class="btn btn-success btn-lg">

                ← Quay lại Tin tức

            </a>

        </div>

    </div>

</section>

@endsection
```
