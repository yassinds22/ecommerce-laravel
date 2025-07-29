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
    <!-- Google Fonts - Tajawal -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background: #f6f7fb;
            color: #222;
        }
        .product-main {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 32px rgba(0,0,0,0.07);
            padding: 32px 24px;
            margin-top: 32px;
        }
        .gallery-wrap {
            display: flex;
            gap: 24px;
        }
        .gallery-thumbs {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
        }
        .gallery-thumb {
            width: 60px;
            height: 60px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid transparent;
            cursor: pointer;
            transition: border 0.2s;
        }
        .gallery-thumb.active, .gallery-thumb:hover {
            border: 2px solid #ff9900;
        }
        .gallery-main-img {
            width: 350px;
            height: 350px;
            object-fit: contain;
            border-radius: 16px;
            background: #f9f9fb;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        }
        .product-info-block {
            display: flex;
            flex-direction: column;
            gap: 18px;
        }
        .product-title {
            font-size: 2rem;
            font-weight: 700;
            color: #222;
        }
        .product-rating {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .stars {
            color: #ffc107;
            font-size: 1.2rem;
        }
        .review-link {
            color: #007185;
            font-size: 1rem;
            text-decoration: underline;
            cursor: pointer;
        }
        .product-price-block {
            display: flex;
            align-items: baseline;
            gap: 12px;
        }
        .product-price {
            font-size: 2rem;
            font-weight: 700;
            color: #b12704;
        }
        .old-price {
            text-decoration: line-through;
            color: #888;
            font-size: 1.1rem;
            font-weight: 500;
        }
        .discount-badge {
            background: linear-gradient(45deg, #ff9900, #ffb84d);
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 8px;
            padding: 3px 12px;
        }
        .availability {
            color: #007600;
            font-weight: 700;
            font-size: 1.1rem;
        }
        .product-options {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
        }
        .color-option, .storage-option {
            border: 2px solid #eee;
            border-radius: 8px;
            padding: 8px 18px;
            cursor: pointer;
            font-weight: 600;
            background: #fafbfc;
            transition: border 0.2s, background 0.2s;
        }
        .color-option.selected, .storage-option.selected {
            border: 2px solid #ff9900;
            background: #fff7e6;
        }
        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 0;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            width: fit-content;
            overflow: hidden;
        }
        .quantity-btn {
            width: 40px;
            height: 40px;
            background: #f3f4f8;
            color: #ff9900;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: none;
            transition: background 0.2s, color 0.2s;
        }
        .quantity-btn:hover {
            background: #ff9900;
            color: #fff;
        }
        .quantity-input {
            width: 60px;
            height: 40px;
            text-align: center;
            border: none;
            background: #fff;
            font-size: 1.1rem;
            font-weight: 700;
            color: #222;
        }
        .buy-actions {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }
        .btn-buy {
            background: linear-gradient(45deg, #ff9900, #ffb84d);
            color: #fff;
            font-weight: 700;
            border-radius: 12px;
            padding: 14px 32px;
            font-size: 1.1rem;
            border: none;
            box-shadow: 0 2px 8px rgba(255, 153, 0, 0.13);
            transition: background 0.2s, transform 0.2s;
        }
        .btn-buy:hover {
            background: linear-gradient(45deg, #e68a00, #ffb84d);
            transform: translateY(-2px);
        }
        .btn-fav {
            background: #fff;
            color: #ff9900;
            border: 2px solid #ff9900;
            font-weight: 700;
            border-radius: 12px;
            padding: 14px 28px;
            font-size: 1.1rem;
            transition: background 0.2s, color 0.2s;
        }
        .btn-fav:hover {
            background: #ff9900;
            color: #fff;
        }
        .product-short-desc {
            color: #444;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }
        .tab-section {
            margin-top: 48px;
        }
        .nav-tabs {
            border: none;
            margin-bottom: 0;
        }
        .nav-tabs .nav-link {
            color: #222;
            font-weight: 700;
            border: none;
            padding: 14px 32px;
            font-size: 1.1rem;
            background: #f6f7fb;
            border-radius: 12px 12px 0 0;
            margin: 0 4px;
            transition: background 0.2s, color 0.2s;
        }
        .nav-tabs .nav-link.active {
            background: #fff;
            color: #ff9900;
        }
        .tab-content {
            background: #fff;
            border-radius: 0 0 18px 18px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            padding: 32px 24px;
            border: none;
        }
        .specs-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
        }
        .specs-table td {
            padding: 12px 18px;
            font-size: 1rem;
            border-bottom: 1px solid #f0f0f0;
        }
        .review-card {
            background: #f9f9fb;
            border-radius: 12px;
            padding: 22px 18px;
            margin-bottom: 18px;
            box-shadow: 0 1px 6px rgba(0,0,0,0.04);
        }
        @media (max-width: 991px) {
            .product-main {
                padding: 18px 6px;
            }
            .tab-content {
                padding: 18px 6px;
            }
            .gallery-main-img {
                width: 100%;
                height: 220px;
            }
        }
        @media (max-width: 767px) {
            .product-main {
                margin-top: 12px;
                padding: 8px 2px;
            }
            .gallery-wrap {
                flex-direction: column;
                align-items: center;
            }
            .gallery-main-img {
                width: 100%;
                height: 180px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="product-main">
            <div class="row g-5">
                <!-- معرض الصور -->
                <div class="col-lg-5">
                    <div class="gallery-wrap">
                        <div class="gallery-thumbs">
                            <img src="{{$data->getFirstMediaUrl('images')}}" class="gallery-thumb active" data-big="{{$data->getFirstMediaUrl('images')}}" alt="صورة 1">
                            <!-- يمكنك تكرار الصور المصغرة هنا إذا كان لديك أكثر من صورة -->
                        </div>
                        <img src="{{$data->getFirstMediaUrl('images')}}" alt="{{$data->name}}" class="gallery-main-img" id="mainProductImg">
                    </div>
                </div>
                <!-- معلومات المنتج -->
                <div class="col-lg-7">
                    <div class="product-info-block">
                        <div class="product-title">{{$data->name}}</div>
                        <div class="product-rating">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="review-link">(24 تقييم)</span>
                        </div>
                        <div class="product-price-block">
                            <span class="product-price">{{$data->purchase_price}} ر.س</span>
                            <span class="old-price">{{$data->purchase_price + 200}} ر.س</span>
                            <span class="discount-badge">خصم 15%</span>
                        </div>
                        <div class="availability"><i class="fas fa-check-circle me-1"></i>متوفر في المخزون</div>
                        <div class="product-short-desc">{{$data->description}}</div>
                        <div>
                            <div class="mb-2 fw-bold">السعة:</div>
                            <div class="product-options">
                                <div class="storage-option" data-storage="128">128 جيجابايت</div>
                                <div class="storage-option selected" data-storage="256">256 جيجابايت</div>
                                <div class="storage-option" data-storage="512">512 جيجابايت</div>
                            </div>
                        </div>
                        <div>
                            <div class="mb-2 fw-bold">الكمية:</div>
                            <div class="quantity-selector">
                                <button class="quantity-btn" id="decrement">-</button>
                                <input type="text" class="quantity-input" value="1" id="quantity">
                                <button class="quantity-btn" id="increment">+</button>
                            </div>
                        </div>
                        <div class="buy-actions">
                            <button class="btn-buy"><i class="fas fa-shopping-cart me-2"></i>أضف إلى السلة</button>
                            <button class="btn-fav"><i class="fas fa-heart me-2"></i>أضف إلى المفضلة</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- تبويبات التفاصيل -->
            <div class="tab-section">
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
                        <h4 class="mb-4 fw-bold">وصف المنتج</h4>
                        <p class="fs-5">{{$data->description}}</p>
                    </div>
                    <div class="tab-pane fade" id="specs" role="tabpanel">
                        <h4 class="mb-4 fw-bold">المواصفات الفنية</h4>
                        <table class="specs-table">
                            <tr><td class="fw-bold">الشاشة</td><td>6.1 بوصة، ديناميك AMOLED 2X، 120Hz</td></tr>
                            <tr><td class="fw-bold">المعالج</td><td>Snapdragon 8 Gen 2 for Galaxy</td></tr>
                            <tr><td class="fw-bold">الذاكرة</td><td>8 جيجابايت RAM</td></tr>
                            <tr><td class="fw-bold">التخزين</td><td>256 جيجابايت (غير قابلة للتوسيع)</td></tr>
                            <tr><td class="fw-bold">الكاميرا الخلفية</td><td>ثلاثية: 50MP رئيسية + 12MP واسعة + 10MP تيليفوتوغرافي</td></tr>
                            <tr><td class="fw-bold">الكاميرا الأمامية</td><td>12 ميجابكسل</td></tr>
                            <tr><td class="fw-bold">البطارية</td><td>3900 مللي أمبير، شحن سريع 25W، شحن لاسلكي</td></tr>
                            <tr><td class="fw-bold">نظام التشغيل</td><td>Android 13 مع One UI 5.1</td></tr>
                            <tr><td class="fw-bold">المقاومة</td><td>IP68 ضد الماء والغبار</td></tr>
                            <tr><td class="fw-bold">الأبعاد والوزن</td><td>146.3 × 70.9 × 7.6 مم، 168 جرام</td></tr>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <h4 class="mb-4 fw-bold">تقييمات العملاء</h4>
                        <!-- تقييم جديد -->
                        <div class="card mb-4 border-0 shadow">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">أضف تقييمك</h5>
                                <div class="mb-4">
                                    <label class="form-label fw-bold">التقييم</label>
                                    <div class="stars mb-3">
                                        <i class="far fa-star fs-3 me-1 text-warning" data-rating="1" style="cursor: pointer;"></i>
                                        <i class="far fa-star fs-3 me-1 text-warning" data-rating="2" style="cursor: pointer;"></i>
                                        <i class="far fa-star fs-3 me-1 text-warning" data-rating="3" style="cursor: pointer;"></i>
                                        <i class="far fa-star fs-3 me-1 text-warning" data-rating="4" style="cursor: pointer;"></i>
                                        <i class="far fa-star fs-3 text-warning" data-rating="5" style="cursor: pointer;"></i>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label fw-bold">التعليق</label>
                                    <textarea class="form-control" rows="4" placeholder="شاركنا تجربتك مع المنتج" style="border-radius: 15px;"></textarea>
                                </div>
                                <button class="btn btn-buy px-4 py-2">إرسال التقييم</button>
                            </div>
                        </div>
                        <!-- تقييمات موجودة -->
                        <div class="review-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="fw-bold">محمد أحمد</div>
                                <div class="text-muted" style="font-size:0.95rem;">15 مايو 2023</div>
                            </div>
                            <div class="stars mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div>هاتف ممتاز بكل المقاييس، الشاشة رائعة والأداء سريع جداً، البطارية تدوم لي ليوم كامل مع الاستخدام المتوسط. الكاميرا تلتقط صوراً رائعة خاصة في الإضاءة المنخفضة. أنصح به بشدة.</div>
                        </div>
                        <div class="review-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="fw-bold">سارة خالد</div>
                                <div class="text-muted" style="font-size:0.95rem;">10 أبريل 2023</div>
                            </div>
                            <div class="stars mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div>تجربة رائعة بشكل عام، التصميم أنيق ومريح في اليد، الأداء سريع وسلس. لكن البطارية أتمنى لو كانت أكبر قليلاً. الشحن سريع جداً مما يعوض ذلك. الكاميرا ممتازة وخاصة وضع البورتريه.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // تغيير الصورة الرئيسية عند الضغط على صورة مصغرة
        document.querySelectorAll('.gallery-thumb').forEach(thumbnail => {
            thumbnail.addEventListener('click', function() {
                document.querySelectorAll('.gallery-thumb').forEach(img => img.classList.remove('active'));
                this.classList.add('active');
                document.getElementById('mainProductImg').src = this.getAttribute('data-big');
            });
        });
        // كمية المنتج
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
        // اختيار السعة
        document.querySelectorAll('.storage-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.storage-option').forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
            });
        });
        // تقييم النجوم
        document.querySelectorAll('.stars i[data-rating]').forEach(star => {
            star.addEventListener('click', function() {
                const rating = parseInt(this.getAttribute('data-rating'));
                const starsContainer = this.parentElement;
                starsContainer.querySelectorAll('i').forEach((s, index) => {
                    if (index < rating) {
                        s.classList.remove('far');
                        s.classList.add('fas');
                    } else {
                        s.classList.remove('fas');
                        s.classList.add('far');
                    }
                });
            });
        });
    </script>
</body>
</html>