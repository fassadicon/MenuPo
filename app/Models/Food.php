<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'foods';
    // Relationship To User
    public function admin() {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function philfct() {
        return $this->belongsTo(Philfct::class, 'philfct_id', 'id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'food_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'food_id', 'id');
    }

    public function menu()
    {
        return $this->hasOne(Menu::class, 'food_id', 'id');
    }

    public function menus()
    {
        return $this->hasOne(Menu::class, 'food_id', 'id');
    }
}