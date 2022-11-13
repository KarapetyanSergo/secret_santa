<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'recipient_id',
    ];

    public function recipient(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'recipient_id');
    }

    public function santa(): HasOne
    {
        return $this->hasOne(User::class, 'recipient_id', 'id');
    }
}
