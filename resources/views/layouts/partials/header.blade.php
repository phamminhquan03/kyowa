<style>
nav a{
    transition: .3s;
}

nav a:hover{
    color:#0d6efd !important;
}

header{
    z-index:1050;
}
.form-control.rounded-pill{
    height:45px;
    box-shadow:none;
    transition:.3s;
}

.form-control.rounded-pill:focus{
    border-color:#0d6efd;
    box-shadow:0 0 10px rgba(13,110,253,.15);
}
nav .nav-link{
    transition:.3s;
}

nav .nav-link:hover{
    color:#0d6efd !important;
}

header{
    z-index:1050;
}

.form-control.rounded-pill{
    height:45px;
    box-shadow:none;
}

.form-control.rounded-pill:focus{
    border-color:#0d6efd;
    box-shadow:0 0 10px rgba(13,110,253,.15);
}

@media (max-width: 991px){

    .navbar-nav{
        text-align:center;
        padding:15px 0;
    }

    .navbar-nav .nav-item{
        margin:5px 0;
    }

    form.d-flex{
        width:100%;
        margin-top:10px;
    }
}
</style>
<header class="fixed-top bg-white shadow-sm">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand fw-bold text-primary fs-2" href="/">
                KYOWA
            </a>

            <!-- Nút mobile -->
            <button class="navbar-toggler border-0 shadow-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse" id="mainMenu">

                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="/">
                            Trang chủ
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="/gioi-thieu">
                            Giới thiệu
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="/dich-vu">
                            Dịch vụ
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="/tin-tuc">
                            Tin tức
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="/lien-he">
                            Liên hệ
                        </a>
                    </li>

                </ul>

                <!-- Search -->
                <form action="/search" method="GET" class="d-flex">
                    <div class="position-relative w-100">

                        <input
                            type="text"
                            name="keyword"
                            class="form-control rounded-pill ps-4 pe-5"
                            placeholder="Tìm kiếm dịch vụ...">

                        <button
                            type="submit"
                            class="btn position-absolute top-50 end-0 translate-middle-y border-0 me-2">

                            <i class="bi bi-search text-primary"></i>

                        </button>

                    </div>
                </form>

            </div>

        </div>
    </nav>
</header>

<div style="height:80px"></div>

