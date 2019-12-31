<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LoginRepositoryServices;

class AuthController extends Controller
{
    protected $checker;
    protected $req;
    public function __construct(LoginRepositoryServices $lr, Request $r)
    {
        $this->checker = $lr;
        $this->req = $r;
    }
    public function auth($id)
    {
        if($id and $this->req->has('_token')){
          return $this->checker->authCheck();
        }
    }
    //
}
