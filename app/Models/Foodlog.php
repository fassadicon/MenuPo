<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foodlog extends Model
{
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }
    
    public function food() {
        return $this->belongsTo(Food::class, 'food_id', 'id');
    }
}
