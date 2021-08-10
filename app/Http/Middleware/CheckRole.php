<?php

namespace App\Http\Middleware;

use App\Models\Division;
use Closure;
use Exception;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles) //$request jalan di hold oleh closure
                                                                //kemudian $roles check looping ke database
    {

        $name = Auth::user()->level->name; //Auth::user ngecek nama level
        if (is_array($roles)) {
            foreach ($roles as $key => $role) {
                if ($name === $role) { // $name di cek dengen ==== sampai kevariable
                    return $next($request);
                }
            }
        }
        if ($roles === $name) {
            return $next($request);
        }
        throw new Exception('Anda tidak memiliki akses ke halaman tersebut!'); //tampilan error jika kondisi diatas tidak terpenuhi
        return redirect()->back();
    }
}
