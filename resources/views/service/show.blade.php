@extends('layouts.app')

@section('content')

<style>
    .service-content figure {
        text-align: center;
        margin: 20px 0;
    }

    .service-content img {
        max-width: 100%;
        height: auto;
        border-radius: 12px;
        display: inline-block;
    }

    /* Ảnh banner đầu */
    .service-banner {
        width: 100%;
        max-width: 900px; /* giới hạn chiều rộng */
        height: 400px;
        object-fit: cover;
        border-radius: 16px;
        display: block;
       
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
</style>

<div class="container  my-3">

    {{-- TITLE --}}
    <h1 class="text-center mb-5">
        {{ $service->title }}
    </h1>

    {{-- ẢNH --}}
    <img 
        src="{{ url('uploads/' . $service->image) }}" 
        class="service-banner"
        alt=""
    >

    {{-- CONTENT --}}
    <div class="about-content">
        {!! $service?->description !!}
    </div>

</div>

@endsection