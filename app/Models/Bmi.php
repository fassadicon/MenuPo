<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bmi extends Model
{
    use HasFactory;
    protected $table = 'bmis';
    public function student() {
        return $this->hasOne(Student::class, 'bmi_id', 'id');
    }
    
}
