<?php 
namespace App\Services;

use App\Status_Transaksi;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;
class TransactionRepositoryServices
{
    protected $transaction;
    public function __construct(TransactionRepository $tr)
    {
        $this->transaction = $tr;
    }
    public function getAll()
    {
        return $this->transaction->getAll();
    }
    public function getDraft()
    {
        return $this->transaction->getDraft();
    }
    public function getStatus()
    {
        return $this->transaction->getStatus();
    }
    public function getApproved()
    {
        return $this->transaction->getApproved();
    }
    public function getRejected()
    {
        return $this->transaction->getRejected();
    }
}
?>