<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
