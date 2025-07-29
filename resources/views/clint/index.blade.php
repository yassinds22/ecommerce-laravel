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
    <!-- Header -->
    @include('clint.layout.header')

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content text-center text-lg-start">
                        <h1 class="display-4 fw-bold mb-4">اكتشف أفضل المنتجات</h1>
                        <p class="lead mb-4">تسوق من مجموعة واسعة من المنتجات عالية الجودة بأفضل الأسعار</p>
                        <button class="btn btn-light btn-lg px-4" onclick="scrollToProducts()">
                            <i class="fas fa-shopping-bag me-2"></i>تسوق الآن
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="text-center hero-img">
                        <img src="https://images.unsplash.com/photo-1607082350899-7e105aa886ae?q=80&w=1470&auto=format&fit=crop" 
                             alt="متجر إلكتروني" class="img-fluid rounded-3 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="features">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h5>شحن سريع</h5>
                    <p>توصيل سريع خلال 24-48 ساعة</p>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h5>دفع آمن</h5>
                    <p>أنظمة دفع آمنة ومشفرة</p>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h5>دعم فني</h5>
                    <p>دعم فني متاح على مدار الساعة</p>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="feature-icon">
                        <i class="fas fa-undo"></i>
                    </div>
                    <h5>إرجاع سهل</h5>
                    <p>سياسة إرجاع لمدة 14 يوم</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products py-5" id="products">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary mb-3 section-title">منتجاتنا المميزة</h2>
                <p class="lead text-muted">اختر من مجموعة متنوعة من المنتجات عالية الجودة</p>
            </div>
            <div class="row g-4" id="productsGrid">
                <!-- Product 1 -->
                  @foreach ($data as $item)
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="position-relative overflow-hidden">
                            <img src="{{$item->getFirstMedia('images')?->getUrl()}}" class="card-img-top" alt="سماعات لاسلكية" style="height: 200px; object-fit: cover;">
                            <div class="badge bg-danger badge-new">جديد</div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold"> {{$item->name}}</h5>
                            <div class="text-success fw-bold fs-5 mb-2">{{$item->purchase_price}} ريال</div>
                            <p class="card-text text-muted flex-grow-1">{{$item->description}}</p>
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-primary w-100 add-to-cart-button" 
                                        data-product-id="{{ $item->id }}">
                                    <i class="fas fa-shopping-cart me-1"></i>إضافة إلى السلة
                                </button>
                                <a href="#" class="btn btn-outline-primary">
                                    <i class="fas fa-eye me-1"></i>عرض التفاصيل
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
   @include('clint.layout.footer')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // دالة للتمرير إلى قسم المنتجات
        function scrollToProducts() {
            document.getElementById('products').scrollIntoView({ behavior: 'smooth' });
        }
        
        // كود Ajax لإضافة المنتج إلى السلة
        $(document).ready(function() {
            // إعداد رأس CSRF لجميع طلبات Ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            // معالجة النقر على زر الإضافة
            $('.add-to-cart-button').click(function(e) {
                e.preventDefault();
                
                var button = $(this);
                var productId = button.data('product-id');
                
                // تعطيل الزر لمنع النقر المتكرر
                button.prop('disabled', true);
                button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> جاري الإضافة...');
                
                // إرسال طلب Ajax
                $.ajax({
                    type: 'POST',
                    url: '/cart/add/' + productId,
                    data: {
                        // لا حاجة لإرسال بيانات إضافية
                    },
                    success: function(response) {
                        if (response.success) {
                            // تحديث عدد العناصر في السلة
                            $('#cart-count').text(response.cart_count);
                            
                            // تغيير الزر إلى حالة "تمت الإضافة"
                            button.html('<i class="fas fa-check me-1"></i> تمت الإضافة');
                            button.removeClass('btn-primary').addClass('btn-success btn-disabled');
                            
                            // إظهار إشعار النجاح
                            showNotification('تمت الإضافة بنجاح!', 'تمت إضافة المنتج إلى سلة التسوق الخاصة بك', 'success');
                        } else {
                            // في حالة الخطأ
                            showNotification('حدث خطأ!', response.message || 'لم يتم إضافة المنتج إلى السلة', 'danger');
                            button.prop('disabled', false);
                            button.html('<i class="fas fa-shopping-cart me-1"></i> إضافة إلى السلة');
                        }
                    },
                    error: function(xhr) {
                        // في حالة فشل الطلب
                        var errorMessage = xhr.responseJSON && xhr.responseJSON.message 
                            ? xhr.responseJSON.message 
                            : 'تعذر الاتصال بالخادم، يرجى المحاولة مرة أخرى';
                            
                        showNotification('حدث خطأ!', errorMessage, 'danger');
                        button.prop('disabled', false);
                        button.html('<i class="fas fa-shopping-cart me-1"></i> إضافة إلى السلة');
                    }
                });
            });
            
            // دالة لعرض الإشعارات
            function showNotification(title, message, type) {
                // إزالة أي إشعارات سابقة
                $('.notification').remove();
                
                // إنشاء عنصر الإشعار
                var alertClass = 'alert-' + type;
                var iconClass = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
                
                var notification = $(
                    '<div class="notification">' +
                    '   <div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">' +
                    '       <div class="d-flex align-items-center">' +
                    '           <i class="fas ' + iconClass + ' me-2 fs-4"></i>' +
                    '           <div>' +
                    '               <h5 class="mb-0">' + title + '</h5>' +
                    '               <p class="mb-0">' + message + '</p>' +
                    '           </div>' +
                    '       </div>' +
                    '       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '   </div>' +
                    '</div>'
                );
                
                // إضافة الإشعار إلى الصفحة
                $('body').append(notification);
                
                // إزالة الإشعار بعد 3 ثواني
                setTimeout(function() {
                    notification.fadeOut(500, function() {
                        $(this).remove();
                    });
                }, 3000);
            }
        });
    </script>
    <script>
    $(document).ready(function() {
        fetchCartCount();

        function fetchCartCount() {
            $.ajax({
                url: "{{ route('cart.count') }}",
                method: 'GET',
                success: function(response) {
                    $('#cart-count').text(response.count);
                },
                error: function() {
                    console.error('فشل في تحميل عدد السلة');
                }
            });
        }
    });
</script>
</body>
</html>