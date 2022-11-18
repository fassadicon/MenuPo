<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function admin() {
        return $this->belongsTo(Admin::class, 'served_by', 'id');
    }

    public function payment() {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'purchase_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'purchase_id', 'id');
    }

    public function parent() {
        return $this->belongsTo(Guardian::class, 'parent_id', 'id');
    }

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }    
}
