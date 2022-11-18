<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    // Relationship To User
    public function admin() {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function food() {
        return $this->belongsTo(Food::class, 'food_id', 'id');
    }
}
