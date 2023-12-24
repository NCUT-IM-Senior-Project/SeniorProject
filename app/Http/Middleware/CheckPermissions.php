<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, ...$permissions)
    {
        $user = Auth::user();
        //檢查使用者是否有權限進入此頁面
        if ($user && $user->hasAnyPermission($permissions)) {
            return $next($request);
        }

        // 如果使用者沒有權限，轉跳403頁面
        abort(403, '你沒有權限進入此頁面');
    }
}
