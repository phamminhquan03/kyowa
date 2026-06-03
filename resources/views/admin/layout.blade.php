<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    {{-- BOOTSTRAP --}}
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >

    {{-- GOOGLE FONT --}}
    <link 
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" 
        rel="stylesheet"
    >
<link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}">
    <style>

        body{
            font-family: 'Poppins', sans-serif;
            background: #f4f7fb;
        }

        /* SIDEBAR */
        .sidebar{
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #111827;
            padding: 30px 20px;
            overflow-y: auto;
        }

        .sidebar h3{
            color: white;
            font-weight: 700;
            margin-bottom: 35px;
        }

        .sidebar .menu-link{
            display: block;
            padding: 14px 18px;
            margin-bottom: 12px;
            border-radius: 12px;
            text-decoration: none;
            color: #d1d5db;
            transition: 0.3s;
            font-weight: 500;
        }

        .sidebar .menu-link:hover{
            background: #2563eb;
            color: white;
            transform: translateX(4px);
        }

        /* CONTENT */
        .main-content{
            margin-left: 260px;
            padding: 40px;
        }

        /* CARD */
        .content-card{
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }

        /* TITLE */
        .page-title{
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 25px;
        }

    </style>

</head>

<body>

    {{-- SIDEBAR --}}
    <div class="sidebar">

        <h3>
            ADMIN
        </h3>

        <a href="/dashboard" class="menu-link">
            Dashboard
        </a>

        <a href="/admin/homepage" class="menu-link">
            Quản lý giới thiệu
        </a>

        <a href="/admin/service" class="menu-link">
            Quản lý dịch vụ
        </a>

        <a href="/admin/banner" class="menu-link">
            Quản lý banner
        </a>
        <a href="/admin/news" class="menu-link">
            Quản lý tin tức
        </a>
        <a href="/admin/contacts" class="menu-link">
            Quản lý Liên hệ
        </a>


    </div>

    {{-- MAIN CONTENT --}}
    <div class="main-content">

        <div class="content-card">

            @yield('content')

        </div>

    </div>

    {{-- PAGE SCRIPTS --}}
    @yield('scripts')

</body>

</html>