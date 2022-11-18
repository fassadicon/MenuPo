<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Philfct extends Model
{
    protected $table = 'philfcts';
    public $incrementing = false;
    use HasFactory;

    public function food()
    {
        return $this->hasOne(Food::class, 'philfct_id', 'id');
    }

    public function foods()
    {
        return $this->hasMany(Food::class, 'philfct_id', 'id');
    }
}
