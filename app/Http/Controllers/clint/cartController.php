<?php

namespace App\Http\Controllers\clint;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItme;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class cartController extends Controller
{



  // إضافة منتج إلى السلة
public function addToCart(Request $request, Product $product)
{
    $user = Auth::user();

    // الحصول أو إنشاء السلة
    $cart = $user->cart ?: Cart::create([
        'user_id' => $user->id,
        'status' => 'pending'
    ]);

    // التحقق من وجود المنتج في السلة
    $cartItem = $cart->items()->where('product_id', $product->id)->first();

    // الكمية القادمة من المستخدم أو 1 كافتراضي
    $quantityToAdd = $request->input('quantity', 1);

    if ($cartItem) {
        $cartItem->update([
            'quantity' => $cartItem->quantity + $quantityToAdd,
        ]);

        // المنتج كان موجودًا وتم تحديث الكمية فقط
        return response()->json([
            'success' => false,
            'message' => 'المنتج مضاف مسبقًا، تم زيادة الكمية في السلة.'
        ]);
    } else {
        CartItme::create([
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'quantity' => $quantityToAdd,
            'price' => $product->purchase_price,
        ]);

        // المنتج تمت إضافته بنجاح
        $totalQuantity = $cart->items()->sum('quantity');

        return response()->json([
            'success' => true,
            'cart_count' => $totalQuantity,
            'message' => 'تم إضافة المنتج إلى السلة بنجاح!'
        ]);
    }
}




public function showCartItem()
{
    $userId = Auth::id();
    $user= Auth::user();


//some colum
    // $cart = Cart::where('user_id', $userId)
    //             ->with(['items.product' => function($query) {
    //                 $query->select('id', 'name','description', 'purchase_price');
    //             }])
    //             ->first();
      $cart = Cart::where('user_id', $userId)
                ->with('items.product')->first();
//select all tabel
    if (!$cart || $cart->items->isEmpty()) {
        return redirect()->back();
    }

    $total = $cart->items->sum(function($item) {
        return $item->price * $item->quantity;
    });
    $infoUser = Cart::where('user_id', $userId)->with('user') ->first() ->user;
   
    //return response()->json($infoUser);

    return view('clint.cartItem', ['cartItems' => $cart,'total' => $total,'infoUser'=> $infoUser]);

    //return response()->json($cart);
}


  public function removeFromCart(Request $request, Product $product)
{
    $user = Auth::user();
    $cart = $user->cart;

    if ($cart) {
        $item = $cart->items()->where('product_id', $product->id)->first();
        if ($item) {
            $item->delete();
        }
    }

    return response()->json([
        'message' => 'تم حذف المنتج من السلة.',
        'product_id' => $product->id,
        'csrf' => csrf_token(),
        'add_url' => route('cart.add', $product->id)
    ]);
}



}
