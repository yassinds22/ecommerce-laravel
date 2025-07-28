<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل المنتج - متجر إلكتروني</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --accent-color: #36b9cc;
            --light-color: #f8f9fc;
            --dark-color: #5a5c69;
        }
        
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            padding-top: 20px;
        }
        
        .product-card {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            transition: transform 0.3s ease;
            background: white;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
        }
        
        .product-img-container {
            position: relative;
            overflow: hidden;
            border-radius: 15px 15px 0 0;
        }
        
        .product-img {
            width: 100%;
            height: 350px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .product-img-container:hover .product-img {
            transform: scale(1.05);
        }
        
        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            z-index: 10;
            font-size: 0.9rem;
            padding: 5px 12px;
            border-radius: 20px;
        }
        
        .product-title {
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--dark-color);
        }
        
        .product-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 15px;
        }
        
        .old-price {
            text-decoration: line-through;
            color: var(--secondary-color);
            font-size: 1.1rem;
            margin-right: 10px;
        }
        
        .discount-percent {
            background-color: #e74a3b;
            color: white;
            padding: 2px 8px;
            border-radius: 5px;
            font-size: 0.9rem;
            margin-left: 10px;
        }
        
        .product-actions .btn {
            border-radius: 30px;
            padding: 10px 20px;
            font-weight: 600;
            margin: 5px 0;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .quantity-selector {
            display: flex;
            align-items: center;
            margin: 15px 0;
        }
        
        .quantity-btn {
            width: 40px;
            height: 40px;
            border: 1px solid #ddd;
            background-color: #f8f9fc;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        
        .quantity-input {
            width: 60px;
            height: 40px;
            text-align: center;
            border: 1px solid #ddd;
            border-left: none;
            border-right: none;
        }
        
        .specs-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .specs-table tr {
            border-bottom: 1px solid #eee;
        }
        
        .specs-table td {
            padding: 12px 10px;
        }
        
        .specs-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .tab-content {
            padding: 20px;
            border: 1px solid #ddd;
            border-top: none;
            border-radius: 0 0 10px 10px;
            background: white;
        }
        
        .nav-tabs .nav-link {
            color: var(--dark-color);
            font-weight: 600;
            border: none;
            border-bottom: 3px solid transparent;
            padding: 15px 25px;
        }
        
        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            border-bottom: 3px solid var(--primary-color);
            background: transparent;
        }
        
        .review-card {
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            background: white;
        }
        
        .review-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .review-author {
            font-weight: 700;
            color: var(--dark-color);
        }
        
        .review-date {
            color: var(--secondary-color);
            font-size: 0.9rem;
        }
        
        .stars {
            color: #f39c12;
            margin-bottom: 10px;
        }
        
        .related-products {
            margin-top: 50px;
        }
        
        .section-title {
            position: relative;
            margin-bottom: 30px;
            padding-bottom: 15px;
            font-weight: 700;
            color: var(--dark-color);
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 80px;
            height: 3px;
            background-color: var(--primary-color);
        }
        
        .feature-icon {
            width: 50px;
            height: 50px;
            background-color: rgba(78, 115, 223, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            color: var(--primary-color);
            font-size: 1.2rem;
        }
        
        @media (max-width: 768px) {
            .product-img {
                height: 250px;
            }
            
            .product-actions .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container mb-5">
        <!-- شريط التنقل -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow-sm mb-4">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold" href="#">
                    <i class="fas fa-shopping-bag me-2 text-primary"></i>متجر إلكتروني
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">المنتجات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">التصنيفات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">عنا</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">اتصل بنا</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="#" class="btn btn-outline-primary mx-2">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="badge bg-danger">3</span>
                        </a>
                        <a href="#" class="btn btn-primary">
                            <i class="fas fa-user me-1"></i> تسجيل الدخول
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- مسار التنقل -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-light p-3 rounded shadow-sm">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="#">الإلكترونيات</a></li>
                <li class="breadcrumb-item"><a href="#">الهواتف الذكية</a></li>
                <li class="breadcrumb-item active" aria-current="page">سامسونج جالكسي S23</li>
            </ol>
        </nav>

        <!-- تفاصيل المنتج -->
        <div class="row g-4 mb-5">
            <!-- صور المنتج -->
            <div class="col-lg-6">
                <div class="product-card">
                    <div class="product-img-container">
                        <img src="{{$data->getFirstMedia('images')?->getUrl()}}" alt="سامسونج جالكسي S23" class="product-img">
                        <span class="product-badge bg-danger">خصم 15%</span>
                    </div>
                    
                    <!-- الصور المصغرة -->
                    <div class="row g-2 mt-3 px-3">
                        <div class="col-3">
                            <img src="https://images.samsung.com/is/image/samsung/p6pim/ar/2302/gallery/ar-galaxy-s23-s918-sm-s918bzkgmea-534866767?$130_104_PNG$" alt="صورة 1" class="img-thumbnail active">
                        </div>
                        <div class="col-3">
                            <img src="https://images.samsung.com/is/image/samsung/p6pim/ar/2302/gallery/ar-galaxy-s23-s918-sm-s918bzkgmea-534866760?$130_104_PNG$" alt="صورة 2" class="img-thumbnail">
                        </div>
                        <div class="col-3">
                            <img src="https://images.samsung.com/is/image/samsung/p6pim/ar/2302/gallery/ar-galaxy-s23-s918-sm-s918bzkgmea-534866764?$130_104_PNG$" alt="صورة 3" class="img-thumbnail">
                        </div>
                        <div class="col-3">
                            <img src="https://images.samsung.com/is/image/samsung/p6pim/ar/2302/gallery/ar-galaxy-s23-s918-sm-s918bzkgmea-534866769?$130_104_PNG$" alt="صورة 4" class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- معلومات المنتج -->
            <div class="col-lg-6">
                <div class="product-card p-4">
                    <h1 class="product-title">{{$data->name}}</h1>
                    
                    <!-- التقييمات -->
                    <div class="d-flex align-items-center mb-3">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="ms-2 text-muted">(24 تقييم)</span>
                        <span class="ms-3"><i class="fas fa-check-circle text-success me-1"></i> متوفر في المخزن</span>
                    </div>
                    
                    <!-- السعر -->
                    <div class="product-price">
                        <span class="old-price">{{$data->purchase_price}} ر.س</span>
                       {{$data->purchase_price}} ر.س
                        <span class="discount-percent">15% خصم</span>
                    </div>
                    
                    <p class="text-muted mb-4">هاتف سامسونج جالكسي S23 بشاشة ديناميكية AMOLED مقاس 6.1 بوصة، معالج Snapdragon 8 Gen 2، كاميرا خلفية ثلاثية بدقة 50 ميجابكسل، وبطارية 3900 مللي أمبير.</p>
                    
                    <!-- الألوان -->
                    <div class="mb-4">
                        <h6 class="mb-3">اللون:</h6>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="color" id="color1" checked>
                                <label class="form-check-label" for="color1">
                                    <span class="d-inline-block rounded-circle bg-dark" style="width: 20px; height: 20px;"></span> أسود
                                </label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="color" id="color2">
                                <label class="form-check-label" for="color2">
                                    <span class="d-inline-block rounded-circle bg-light border" style="width: 20px; height: 20px;"></span> أبيض
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="color" id="color3">
                                <label class="form-check-label" for="color3">
                                    <span class="d-inline-block rounded-circle bg-primary" style="width: 20px; height: 20px;"></span> أزرق
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- السعة -->
                    <div class="mb-4">
                        <h6 class="mb-3">السعة:</h6>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="storage" id="storage1">
                                <label class="form-check-label" for="storage1">128 جيجابايت</label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="storage" id="storage2" checked>
                                <label class="form-check-label" for="storage2">256 جيجابايت</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="storage" id="storage3">
                                <label class="form-check-label" for="storage3">512 جيجابايت</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- الكمية -->
                    <div class="mb-4">
                        <h6 class="mb-3">الكمية:</h6>
                        <div class="quantity-selector">
                            <div class="quantity-btn" id="decrement">-</div>
                            <input type="text" class="quantity-input" value="1" id="quantity">
                            <div class="quantity-btn" id="increment">+</div>
                        </div>
                    </div>
                    
                    <!-- الأزرار -->
                    <div class="product-actions mb-4">
                        <button class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-shopping-cart me-2"></i>أضف إلى السلة
                        </button>
                        <button class="btn btn-outline-primary w-100">
                            <i class="fas fa-heart me-2"></i>أضف إلى المفضلة
                        </button>
                    </div>
                    
                    <!-- الضمان والتوصيل -->
                    <div class="d-flex justify-content-between border-top pt-3">
                        <div class="text-center">
                            <div class="feature-icon mx-auto">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div>توصيل مجاني</div>
                        </div>
                        <div class="text-center">
                            <div class="feature-icon mx-auto">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div>ضمان سنة</div>
                        </div>
                        <div class="text-center">
                            <div class="feature-icon mx-auto">
                                <i class="fas fa-sync-alt"></i>
                            </div>
                            <div>إرجاع مجاني</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- تفاصيل إضافية -->
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs" id="productTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button">الوصف</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button">المواصفات</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button">التقييمات (24)</button>
                    </li>
                </ul>
                <div class="tab-content" id="productTabsContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <h4 class="mb-3">وصف المنتج</h4>
                        <p>هاتف سامسونج جالكسي S23 هو أحدث إصدار من سلسلة هواتف S الرائدة من سامسونج. يأتي الهاتف بشاشة ديناميكية AMOLED مقاس 6.1 بوصة بدقة FHD+ وبتقنية HDR10+ ومعدل تحديث 120 هرتز.</p>
                        <p>يتميز الهاتف بأداء قوي بفضل معالج Snapdragon 8 Gen 2 الخاص بجالكسي، مع ذاكرة وصول عشوائي سعة 8 جيجابايت ومساحة تخزين داخلية 256 جيجابايت.</p>
                        <p>نظام الكاميرا الخلفية ثلاثية العدسات يتكون من:</p>
                        <ul>
                            <li>كاميرا رئيسية بدقة 50 ميجابكسل مع تثبيت بصري</li>
                            <li>كاميرا واسعة الزاوية بدقة 12 ميجابكسل</li>
                            <li>كاميرا تليفوتوغرافية بدقة 10 ميجابكسل</li>
                        </ul>
                        <p>يأتي الهاتف ببطارية سعة 3900 مللي أمبير مع دعم الشحن السريع 25 وات، الشحن اللاسلكي، والشحن العكسي اللاسلكي. كما يدعم الهاتف تقنية 5G، NFC، وحماية IP68 ضد الماء والغبار.</p>
                    </div>
                    <div class="tab-pane fade" id="specs" role="tabpanel">
                        <h4 class="mb-4">المواصفات الفنية</h4>
                        <table class="specs-table">
                            <tr>
                                <td>الشاشة</td>
                                <td>6.1 بوصة، ديناميك AMOLED 2X، 120Hz</td>
                            </tr>
                            <tr>
                                <td>المعالج</td>
                                <td>Snapdragon 8 Gen 2 for Galaxy</td>
                            </tr>
                            <tr>
                                <td>الذاكرة</td>
                                <td>8 جيجابايت RAM</td>
                            </tr>
                            <tr>
                                <td>التخزين</td>
                                <td>256 جيجابايت (غير قابلة للتوسيع)</td>
                            </tr>
                            <tr>
                                <td>الكاميرا الخلفية</td>
                                <td>ثلاثية: 50MP رئيسية + 12MP واسعة + 10MP تيليفوتوغرافي</td>
                            </tr>
                            <tr>
                                <td>الكاميرا الأمامية</td>
                                <td>12 ميجابكسل</td>
                            </tr>
                            <tr>
                                <td>البطارية</td>
                                <td>3900 مللي أمبير، شحن سريع 25W، شحن لاسلكي</td>
                            </tr>
                            <tr>
                                <td>نظام التشغيل</td>
                                <td>Android 13 مع One UI 5.1</td>
                            </tr>
                            <tr>
                                <td>المقاومة</td>
                                <td>IP68 ضد الماء والغبار</td>
                            </tr>
                            <tr>
                                <td>الأبعاد والوزن</td>
                                <td>146.3 × 70.9 × 7.6 مم، 168 جرام</td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <h4 class="mb-4">تقييمات العملاء</h4>
                        
                        <!-- تقييم جديد -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">أضف تقييمك</h5>
                                <div class="mb-3">
                                    <label class="form-label">التقييم</label>
                                    <div class="stars mb-2">
                                        <i class="far fa-star fs-4 me-1" style="cursor: pointer;"></i>
                                        <i class="far fa-star fs-4 me-1" style="cursor: pointer;"></i>
                                        <i class="far fa-star fs-4 me-1" style="cursor: pointer;"></i>
                                        <i class="far fa-star fs-4 me-1" style="cursor: pointer;"></i>
                                        <i class="far fa-star fs-4" style="cursor: pointer;"></i>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">التعليق</label>
                                    <textarea class="form-control" rows="3" placeholder="شاركنا تجربتك مع المنتج"></textarea>
                                </div>
                                <button class="btn btn-primary">إرسال التقييم</button>
                            </div>
                        </div>
                        
                        <!-- تقييمات موجودة -->
                        <div class="review-card">
                            <div class="review-header">
                                <div class="review-author">محمد أحمد</div>
                                <div class="review-date">15 مايو 2023</div>
                            </div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p>هاتف ممتاز بكل المقاييس، الشاشة رائعة والأداء سريع جداً، البطارية تدوم لي ليوم كامل مع الاستخدام المتوسط. الكاميرا تلتقط صوراً رائعة خاصة في الإضاءة المنخفضة. أنصح به بشدة.</p>
                        </div>
                        
                        <div class="review-card">
                            <div class="review-header">
                                <div class="review-author">سارة خالد</div>
                                <div class="review-date">10 أبريل 2023</div>
                            </div>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <p>تجربة رائعة بشكل عام، التصميم أنيق ومريح في اليد، الأداء سريع وسلس. لكن البطارية أتمنى لو كانت أكبر قليلاً. الشحن سريع جداً مما يعوض ذلك. الكاميرا ممتازة وخاصة وضع البورتريه.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- منتجات ذات صلة -->
        <div class="related-products">
            <h3 class="section-title">منتجات ذات صلة</h3>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="product-card h-100">
                        <img src="https://images.samsung.com/is/image/samsung/p6pim/ar/2202/gallery/ar-galaxy-s22-ultra-s908-sm-s908edrgmea-thumb-530606516" class="card-img-top" alt="سامسونج جالكسي S22 الترا">
                        <div class="card-body">
                            <h5 class="card-title">سامسونج جالكسي S22 الترا</h5>
                            <p class="card-text text-muted">512 جيجابايت - أسود</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">3,199 ر.س</span>
                                <span class="text-muted text-decoration-line-through">3,599 ر.س</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-card h-100">
                        <img src="https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/iphone-14-pro-finish-select-202209-6-7inch-deeppurple?wid=2560&hei=1440&fmt=p-jpg&qlt=80&.v=1663703841896" class="card-img-top" alt="آيفون 14 برو">
                        <div class="card-body">
                            <h5 class="card-title">آيفون 14 برو</h5>
                            <p class="card-text text-muted">256 جيجابايت - بنفسجي</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">4,299 ر.س</span>
                                <span class="text-muted text-decoration-line-through">4,799 ر.س</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-card h-100">
                        <img src="https://images.samsung.com/is/image/samsung/p6pim/ar/2302/gallery/ar-galaxy-s23-plus-graphite-534866767?$205_164_PNG$" class="card-img-top" alt="سامسونج جالكسي S23 بلس">
                        <div class="card-body">
                            <h5 class="card-title">سامسونج جالكسي S23 بلس</h5>
                            <p class="card-text text-muted">512 جيجابايت - رمادي</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">3,399 ر.س</span>
                                <span class="text-muted text-decoration-line-through">3,899 ر.س</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="product-card h-100">
                        <img src="https://www.oppo.com/content/dam/oppo/common/mkt/section2/list2/reno8-pro/list/reno8-pro-5g-product-list-blue-427-x-600.png" class="card-img-top" alt="أوبو رينو 8 برو">
                        <div class="card-body">
                            <h5 class="card-title">أوبو رينو 8 برو</h5>
                            <p class="card-text text-muted">256 جيجابايت - أزرق</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">2,199 ر.س</span>
                                <span class="text-muted text-decoration-line-through">2,499 ر.س</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- تذييل الصفحة -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4 class="mb-3">متجر إلكتروني</h4>
                    <p>متجرك الإلكتروني الأول لأحدث الأجهزة الإلكترونية والهواتف الذكية. نوفر لكم أفضل المنتجات بأسعار تنافسية وخدمة عملاء مميزة.</p>
                    <div class="social-icons mt-3">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h5 class="mb-3">روابط سريعة</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white">الرئيسية</a></li>
                        <li class="mb-2"><a href="#" class="text-white">منتجاتنا</a></li>
                        <li class="mb-2"><a href="#" class="text-white">عروض خاصة</a></li>
                        <li class="mb-2"><a href="#" class="text-white">عنا</a></li>
                        <li><a href="#" class="text-white">اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="mb-3">فئات المنتجات</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white">الهواتف الذكية</a></li>
                        <li class="mb-2"><a href="#" class="text-white">الكمبيوتر المحمول</a></li>
                        <li class="mb-2"><a href="#" class="text-white">الأجهزة اللوحية</a></li>
                        <li class="mb-2"><a href="#" class="text-white">الساعات الذكية</a></li>
                        <li><a href="#" class="text-white">الإكسسوارات</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="mb-3">اتصل بنا</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> الرياض، المملكة العربية السعودية</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> +966 11 123 4567</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@example.com</li>
                        <li><i class="fas fa-clock me-2"></i> من الأحد إلى الخميس: 9 صباحاً - 5 مساءً</li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">© 2023 متجر إلكتروني. جميع الحقوق محفوظة.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <img src="https://via.placeholder.com/40x25" alt="Visa" class="me-2">
                    <img src="https://via.placeholder.com/40x25" alt="MasterCard" class="me-2">
                    <img src="https://via.placeholder.com/40x25" alt="Mada">
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // وظيفة لزيادة ونقصان الكمية
        document.getElementById('increment').addEventListener('click', function() {
            const quantityInput = document.getElementById('quantity');
            let quantity = parseInt(quantityInput.value);
            quantityInput.value = quantity + 1;
        });
        
        document.getElementById('decrement').addEventListener('click', function() {
            const quantityInput = document.getElementById('quantity');
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = quantity - 1;
            }
        });
        
        // وظيفة لتحديد الصورة المصغرة النشطة
        document.querySelectorAll('.img-thumbnail').forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                // إزالة النشط من جميع الصور المصغرة
                document.querySelectorAll('.img-thumbnail').forEach(img => {
                    img.classList.remove('active');
                    img.classList.remove('border-primary');
                });
                
                // إضافة النشط للصورة المحددة
                this.classList.add('active');
                this.classList.add('border-primary');
                
                // تغيير الصورة الرئيسية
                const mainImage = document.querySelector('.product-img');
                mainImage.src = this.src.replace('$130_104_PNG$', '$650_519_PNG$');
            });
        });
    </script>
</body>
</html>