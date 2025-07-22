<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Mailable\Address;
use Illuminate\Support\Maillable\Envelope;
use App\Mail\forgitPassword;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
        public function index()
    {
        // عرض صفحة تسجيل الدخول
        return view('auth.login');
    }
    

    public function checkuser(Request $request)
    {
        // تحقق من بيانات تسجيل الدخول
        if (Auth::attempt(['email' => $request->email, 'password' => $request->pass])) {
            return redirect()->route('dash');
        } else {
            return redirect()->back()->withErrors(['error' => 'بيانات غير صحيحة']);
        }
    }
   public function logout(Request $request)
{
    Auth::logout(); // تسجيل الخروج

    $request->session()->invalidate(); // إنهاء الجلسة الحالية
    $request->session()->regenerateToken(); // تجديد توكن الحماية CSRF

    return redirect()->route('login'); // إعادة التوجيه لصفحة تسجيل الدخول
}
    //
    public function forgitPassword(){
        //if (Auth::attempt(['email'=> $request->email,
        return view('auth.forgitPasswod');
    }
    public function resetPassword(Request $request){
       $check=User::where('email', $request->email)->first();
       if(isset($check)){
       Mail::to($check->email)->send(new ForgitPassword(route('update.password',['id'=>$check->id])));
        //$user=User::where('email', $request->email)->first();
    }
    else{
        return response()->json("valid");
       // return redirect()->back()->withErrors(['error'=> 'لا تملك حساب']);
    }
}
public function updatePassword(Request $request, $id){
    $user=User::findOrFail($id); 

    $user::where('id','=',$request->id)->update([
        'password'=> Hash::make($request->pass)
    ]);
 
    return view("auth.user_update_password",compact("user"));

}

}