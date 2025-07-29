
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
                                <a href="detailsptoduct/{{$item->id}}" class="btn btn-outline-primary">
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
   