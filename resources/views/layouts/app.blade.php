<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>EcoCare</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link 
    rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    /* FLOATING SOCIAL BAR */
.floating-social {
    position: fixed;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    z-index: 1000;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.social-btn {
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    font-size: 22px;
    color: white;
    text-decoration: none;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
    border: none;
}

.social-btn:hover {
    transform: translateX(-8px) scale(1.1);
    box-shadow: 0 8px 20px rgba(0,0,0,0.25);
}

.facebook  { background: #1877F2; }
.pinterest { background: #E60023; }
.twitter   { background: #1DA1F2; }
.instagram { background: linear-gradient(135deg, #C13584, #E1306C, #FD1D1D); }
.contact   { background: #333; }

@media (max-width: 992px) {
    .floating-social {
        display: none; /* Ẩn trên mobile nếu muốn */
    }
}
</style>
</head>
<body>

    @include('layouts.partials.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.partials.footer')
<!-- FLOATING SOCIAL BAR -->
<div class="floating-social">
    <a href="https://facebook.com" target="_blank" class="social-btn facebook">
        <i class="bi bi-facebook"></i>
    </a>
    <a href="https://pinterest.com" target="_blank" class="social-btn pinterest">
        <i class="bi bi-pinterest"></i>
    </a>
    <a href="https://twitter.com" target="_blank" class="social-btn twitter">
        <i class="bi bi-twitter"></i>
    </a>
    <a href="https://instagram.com" target="_blank" class="social-btn instagram">
        <i class="bi bi-instagram"></i>
    </a>
    <a href="/lien-he" class="social-btn contact">
        <i class="bi bi-envelope"></i>
    </a>
</div>
</body>
</html>