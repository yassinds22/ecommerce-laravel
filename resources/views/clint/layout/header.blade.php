 <header class="header" style="padding-top: 0px">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand fw-bold fs-3 text-primary" href="#">
                    <i class="fas fa-store me-2"></i>متجرنا
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
              
                
                <div class="collapse navbar-collapse" id="navbarNav" >
                    <ul class="navbar-nav me-auto"  dir="rtl">
                        <li class="nav-item">
                            <a class="nav-link fw-semibold active" href="index.html">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#products">المنتجات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#about">من نحن</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="#contact">اتصل بنا</a>
                        </li>
                    </ul>
                    
                    <div class="d-flex align-items-center gap-3">
                        <button class="btn btn-outline-primary" onclick="showLoginModal()">
                        @if (Auth::check())
                            <i class="fas fa-user me-1"></i>
                            {{Auth::user()->name}}
                        </button>
                         @else
                            <i class="fas fa-user me-1"></i>
                            تسجيل الدخول
                        </button>
                        
                        @endif
                        <span style="color: red"><a href="{{route('logout')}}">logout</a></span>
                       
                        

                        <button class="btn btn-primary position-relative" >
                            <a href="{{route('cartitem')}}"><i class="fas fa-shopping-cart"></i></a>
                         <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-count" id="cartCount">
    @php
        use Illuminate\Support\Facades\Auth;
        use App\Models\Cart;

        $user = Auth::user();
        $count = 0;

        if ($user) {
            $cart = Cart::where('user_id', $user->id)->first();
            if ($cart) {
                $count = $cart->items()->count(); // العلاقة مع العناصر
            }
        }
    @endphp
    {{ $count }}
</span>

                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>