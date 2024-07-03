<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if ($request->has('ten_dang_nhap') && $request->has('mat_khau')) {
        //     $credentials = [
        //         'ten_dang_nhap' => $request->ten_dang_nhap,
        //         'password' => $request->mat_khau,
        //     ];

        //     // Kiểm tra đăng nhập bằng hàm attempt của Auth
        //     if (Auth::attempt($credentials)) {
        //         // Nếu đăng nhập thành công, tiếp tục xử lý yêu cầu
        //         return $next($request);
        //     }
        // }
        // return redirect()->route('admin.dangnhap')->withErrors(['credentials' => 'Invalid credentials.']);
    }
}
