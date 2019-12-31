<?php 
namespace App\Services;

use  App\Repositories\LoginRepository as LR;

class LoginRepositoryServices
{
    protected $lr;
    public function __construct(LR  $logRep){
        $this->lr = $logRep;
    }
    public function authCheck()
    {
        return $this->lr->checkLogin();
    }
}
?>
