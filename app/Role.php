<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Role;

class Role extends Model
{
    protected $table = 'spp_role';
    protected $primaryKey = 'id';
    protected $fillable = [
        'parent', 'jabatan_text'
    ];
    public function Parent(){
        return $this->hasOne(Role::Class, 'id', 'parent');
    }
}
