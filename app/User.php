<?php

namespace App;

use App\Model\Licences;
use App\Model\Transactions;
use App\Model\BotInfoForUsers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Nikolag\Square\Traits\HasCustomers;

class User extends Authenticatable
{
    use Notifiable;
    use HasCustomers;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','password', 'cookies'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function licence() {
        return $this->hasOne(Licences::class, 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transactions::class, 'user_id');
    }

    public function botInfoForUser() {
        return $this->hasOne(BotInfoForUsers::class, 'user_id');
    }
}
