<style>
    footer a{
    transition:.3s;
}

footer a:hover{
    color:#198754 !important;
}

footer .btn{
    transition:.3s;
}

@media(max-width:768px){

    footer{
        text-align:center;
    }

    footer .d-flex{
        justify-content:center;
    }

}
</style>
<footer class="bg-light border-top mt-5">

    <div class="container py-5">

        <div class="row g-5">

            <!-- Logo -->
            <div class="col-lg-4 col-md-6">

                <h2 class="fw-bold text-success mb-3">
                    ECOCARE
                </h2>

                <p class="text-muted">
                    ECOCARE chuyên cung cấp các giải pháp vệ sinh công nghiệp,
                    vệ sinh văn phòng, nhà xưởng và chăm sóc môi trường
                    chuyên nghiệp trên toàn quốc.
                </p>

                <div class="d-flex gap-3 mt-4">

                    <a href="#" class="fs-4 text-dark">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="#" class="fs-4 text-dark">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#" class="fs-4 text-dark">
                        <i class="bi bi-youtube"></i>
                    </a>

                    <a href="#" class="fs-4 text-dark">
                        <i class="bi bi-tiktok"></i>
                    </a>

                </div>

                <a href="tel:0123456789"
                   class="btn btn-success rounded-pill mt-4 px-4">
                    Hotline: 0123 456 789
                </a>

            </div>

            <!-- Menu -->
            <div class="col-lg-2 col-md-6">

                <h5 class="fw-bold mb-4">
                    Điều hướng
                </h5>

                <ul class="list-unstyled">

                    <li class="mb-2">
                        <a href="/" class="text-decoration-none text-muted">
                            Trang chủ
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="/gioi-thieu" class="text-decoration-none text-muted">
                            Giới thiệu
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="/dich-vu" class="text-decoration-none text-muted">
                            Dịch vụ
                        </a>
                    </li>

                    <li class="mb-2">
                        <a href="/tin-tuc" class="text-decoration-none text-muted">
                            Tin tức
                        </a>
                    </li>

                    <li>
                        <a href="/lien-he" class="text-decoration-none text-muted">
                            Liên hệ
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Dịch vụ -->
            <div class="col-lg-3 col-md-6">

                <h5 class="fw-bold mb-4">
                    Dịch vụ nổi bật
                </h5>

                <ul class="list-unstyled text-muted">

                    <li class="mb-2">Vệ sinh công nghiệp</li>

                    <li class="mb-2">Vệ sinh văn phòng</li>

                    <li class="mb-2">Vệ sinh nhà xưởng</li>

                    <li class="mb-2">Tổng vệ sinh sau xây dựng</li>

                    <li class="mb-2">Chăm sóc cây xanh</li>

                </ul>

            </div>

            <!-- Liên hệ -->
            <div class="col-lg-3 col-md-6">

                <h5 class="fw-bold mb-4">
                    Thông tin liên hệ
                </h5>

                <p class="mb-2">
                    <i class="bi bi-envelope-fill text-success me-2"></i>
                    ecocare@gmail.com
                </p>

                <p class="mb-2">
                    <i class="bi bi-telephone-fill text-success me-2"></i>
                    0123 456 789
                </p>

                <p class="mb-4">
                    <i class="bi bi-geo-alt-fill text-success me-2"></i>
                    Hà Nội, Việt Nam
                </p>

                <h6 class="fw-bold mb-3">
                    Đăng ký nhận tin
                </h6>

                <form>

                    <div class="input-group">

                        <input
                            type="email"
                            class="form-control"
                            placeholder="Nhập email">

                        <button
                            class="btn btn-success"
                            type="submit">

                            Gửi

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <div class="border-top">

        <div class="container">

            <div class="row py-3">

                <div class="col-md-6 text-center text-md-start">

                    © {{ date('Y') }} ECOCARE. All rights reserved.

                </div>

                <div class="col-md-6 text-center text-md-end">

                    Thiết kế & phát triển bởi ECOCARE

                </div>

            </div>

        </div>

    </div>

</footer>