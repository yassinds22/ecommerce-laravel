<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>متجر إلكتروني - الصفحة الرئيسية</title>
    <link rel="stylesheet" href="clint/css/bootstrap.min.css">
    <link rel="stylesheet" href="clint/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body dir="rtl">
    <!-- Header -->
   @include('clint.layout.header')

    <!-- Hero Section -->
    <section class="hero bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-6">
                    <div class="hero-content text-center text-lg-start">
                        <h1 class="display-4 fw-bold mb-4">اكتشف أفضل المنتجات</h1>
                        <p class="lead mb-4">تسوق من مجموعة واسعة من المنتجات عالية الجودة بأفضل الأسعار</p>
                        <button class="btn btn-light btn-lg px-4" onclick="scrollToProducts()">
                            <i class="fas fa-shopping-bag me-2"></i>تسوق الآن
                        </button>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-center">
                        <img src="clint/images/banner-image.png" alt="متجر إلكتروني" class="img-fluid rounded-3 shadow">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products py-5" id="products">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary mb-3">منتجاتنا المميزة</h2>
                <p class="lead text-muted">اختر من مجموعة متنوعة من المنتجات عالية الجودة</p>
            </div>
            <div class="row g-4" id="productsGrid">
                <!-- Product Card 1 -->
               @foreach ($data as $data)

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="position-relative overflow-hidden">
                            <img src="{{$data->getFirstMedia('images')?->getUrl()}}" class="card-img-top" alt="هاتف ذكي جديد" style="height: 200px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-danger">جديد</span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-primary">{{$data->name}}</h5>
                            <div class="text-success fw-bold fs-5 mb-2">{{$data->purchase_price}} ريال</div>
                            <p class="card-text text-muted flex-grow-1">{{$data->description}}</p>
                            <div class="d-grid gap-2">
                                <form action="{{ route('cart.add', $data->id) }}" method="POST">
                    @csrf
                   <p class="card-text text-muted flex-grow-1">{{$data->id}}</p>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-shopping-cart me-1"></i>
                        إضافة إلى السلة
                    </button>
                </form>
                                <button class="btn btn-outline-primary">
                                    <i class="fas fa-eye me-1"></i>
                                   <a href="detailsptoduct/{{$data->id}}"> عرض التفاصيل</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
               
               @endforeach

                

               

                <!-- Product Card 7 -->
             
            </div>
        </div>
    </section>

   

    <!-- Footer -->
   @include('clint.layout.footer')


    <script src="admin/assets/js/bootstrap.bundle.min.js"></script>
    <script>
        // Bootstrap Modal Functions
        function showLoginModal() {
            var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        }
        
        function goToCart() {
            window.location.href = 'cart.html';
        }
        
        function scrollToProducts() {
            document.getElementById('products').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</body>
</html> 