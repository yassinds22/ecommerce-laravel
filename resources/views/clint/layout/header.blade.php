
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>متجر إلكتروني - الصفحة الرئيسية</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f9f9f9;
            padding-top: 80px;
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        
        .hero {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 5rem 0;
            color: white;
            border-radius: 0 0 30px 30px;
            margin-bottom: 3rem;
        }
        
        .hero h1 {
            font-weight: 800;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        .hero-content {
            animation: fadeInUp 1s ease-out;
        }
        
        .hero-img {
            animation: fadeInRight 1s ease-out;
        }
        
        .products .card {
            transition: all 0.3s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .products .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .products .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .products .card:hover .card-img-top {
            transform: scale(1.05);
        }
        
        .card-title {
            color: var(--primary-color);
            font-weight: 700;
        }
        
        .price {
            color: #28a745;
            font-weight: 700;
            font-size: 1.25rem;
        }
        
        .card-text {
            color: #6c757d;
            min-height: 72px;
        }
        
        .badge-new {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 0.9rem;
            padding: 5px 10px;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 8px 16px;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
        }
        
        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        footer {
            background: linear-gradient(135deg, var(--dark-color), #1a1a1a);
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 4rem;
        }
        
        .social-icons a {
            color: white;
            font-size: 1.5rem;
            margin: 0 10px;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            color: var(--accent-color);
            transform: translateY(-5px);
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            background: rgba(67, 97, 238, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: var(--primary-color);
            font-size: 1.5rem;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 2rem;
        }
        
        .section-title:after {
            content: "";
            position: absolute;
            width: 50%;
            height: 4px;
            background: var(--primary-color);
            bottom: -10px;
            left: 25%;
            border-radius: 2px;
        }
        
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            width: 22px;
            height: 22px;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .features {
            background-color: white;
            padding: 4rem 0;
            margin: 4rem 0;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }
        
        @media (max-width: 768px) {
            .hero {
                padding: 3rem 0;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            body {
                padding-top: 70px;
            }
        }
        
        /* إضافة أنميشن للإشعارات */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            animation: fadeIn 0.5s ease-out;
            min-width: 300px;
            text-align: right;
        }
        
        /* تصميم الزر عند تعطيله */
        .btn-disabled {
            background-color: #28a745 !important;
            color: white !important;
            cursor: not-allowed;
        }
        
        .btn-disabled:hover {
            background-color: #28a745 !important;
        }
    </style>
</head>
<body dir="rtl">
    
    
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3 text-primary" href="#">
                <i class="fas fa-shopping-bag me-2"></i>متجرنا
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">المنتجات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">التصنيفات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">عروض خاصة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">اتصل بنا</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    <div class="position-relative me-3">
                        <a href="{{route('cartitem')}}" class="btn btn-outline-primary position-relative">
                            <i class="fas fa-shopping-cart"></i></a>
                        <span id="cart-count" class="cart-count">0</span>
                    </div>
                    <form class="d-flex me-2">
                        <input class="form-control me-2" type="search" placeholder="ابحث عن منتج...">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    <div>
                        <a href="#" class="btn btn-outline-primary me-2">تسجيل دخول</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- تأكد من تحميل Bootstrap JS في نهاية الصفحة ليعمل زر القائمة بشكل صحيح في الجوال -->
    


