<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    public function purchase() {
        return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
    }

    public function food() {
        return $this->belongsTo(Food::class, 'food_id', 'id');
    }
}
