

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
    


