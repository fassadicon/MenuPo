<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function purchase() {
        return $this->hasOne(Purchase::class, 'payment_id', 'id');
    }
}
