<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /**
         * 三個判斷：
         * 1.用戶已經登入
         * 2.登入的用戶還沒驗證信箱
         * 3.訪問的不是與 email 驗證相關的 url 或者退出的 url
         */
        if ($request->user() &&
            ! $request->user()->hasVerifiedEmail() &&
            ! $request->is('email/*', 'logout')) {
            
            // 根據客戶端返回對應內容
            return $request->expectsJson()
                        ? abort(403, 'Your email address is not verified.')
                        : redirect()->route('verification.notice');
        }
        
        
        return $next($request);
    }
}
