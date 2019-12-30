<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Detail_user as du;

class ManajemenUser extends Model
{
    protected $table = 'spp_user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nomor_induk', 'username', 'password', 'last_login'
    ];
    public function Detail(){
        return $this->belongsTo(du::class, 'id','id_user');
    }
}
