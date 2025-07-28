<?php

namespace App\Http\Controllers\clint;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItme;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
  // إضافة منتج إلى السلة
    public function addToCart(Request $request, Product $product)
    {
        // $request->validate([
        //     'quantity' => 'required|integer|min:1|max:' . $product->quantity
        // ]);

        $user = Auth::user();
        
        // إنشاء سلة جديدة إذا لم توجد
        $cart = $user->cart ?: Cart::create(['user_id' => $user->id]);

        // البحث عن المنتج في السلة
        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            // تحديث الكمية إذا كان المنتج موجوداً
            $cartItem->update([
                'quantity' => $cartItem->quantity + $request->quantity+1,
            ]);
        } else {
            // إضافة جديد إذا لم يكن موجوداً
            CartItme::create([
                
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                $qual=$request->quantity+1,
                'quantity' =>$qual,
                'price' => $product->purchase_price,
            ]);
        }

        return back()->with('success', 'تمت إضافة المنتج إلى السلة!');
    }
    // public function showCartItem($id)
    // {
    //     $cart = Cart::find($id);

        
    //     return view('clint.cartItem')->with('$data', $cart);
    // }
 

// public function showCartItem()
// {
//     // الحصول على المستخدم الحالي
//     $user = Auth::user()->id;
    
//     // جلب سلة المستخدم مع عناصرها والمنتجات المرتبطة
//     $cart = $user->cart->with(['items.product' => function($query) {
//         $query->select('id', 'name', 'purchase_price');
//     }])->first();

//     // إذا لم يكن للمستخدم سلة أو السلة فارغة
//     if (!$cart || $cart->items->isEmpty()) {
//         return view('cart.show', [
//             'cartItems' => collect(),
//             'total' => 0,
//             'message' => 'سلة التسوق فارغة'
//         ]);
//     }

//     $cartItems = $cart->items;
//     $total = 0;

//     // حساب الإجمالي
//     foreach ($cartItems as $item) {
//         // تأكد من وجود المنتج
//         if ($item->product) {
//             $total += $item->price * $item->quantity;
//         }
//     }
// return response()->json($cart);
//     // تمرير البيانات إلى الواجهة
//    // return view('cart.show', compact('cartItems', 'total'));
// }

public function showCartItem()
{
    $userId = Auth::id();
    
    // استعلام آمن مع التأكد من ملكية السلة
    $cart = Cart::where('user_id', $userId)
                ->with(['items.product' => function($query) {
                    $query->select('id', 'name', 'purchase_price');
                }])
                ->first();

    if (!$cart || $cart->items->isEmpty()) {
        return response()->json([
            'message' => 'سلة التسوق فارغة',
            'cart' => null
        ], 200);
    }

    $total = $cart->items->sum(function($item) {
        return $item->price * $item->quantity;
    });

    return response()->json($cart);
}

    // عرض محتويات السلة
 
    //
}
