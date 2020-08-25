<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    protected $guarded = [];


    public function licence() {
        return $this->hasMany(Licences::class, 'user_id');
    }
}
