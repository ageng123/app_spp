<?php

namespace App\Http\Middleware;

use Closure;
use Redirect;

class UserCheck
{
    protected $path;
    protected $user;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->path = $request->path();
        $this->user = session('username') ? session('username') : 'guest';
        $this->jabatan = session('jabatan') ? session('jabatan') : 'guest';
        // if($this->jabatan == 'guest'){
        //     return $next($request);
        // }
        if ($this->jabatan == 'guest') {
            return redirect('auth/login');
        } elseif ($this->jabatan == 'Siswa' and $this->path != 'spp/Semua') {
            if($this->path != 'spp/Semua' or $this->path != 'dashboard/home'){
                return redirect('dashboard/home');
            } else {
                return $next($request);
            }
        }
        return $next($request);

    }
}
