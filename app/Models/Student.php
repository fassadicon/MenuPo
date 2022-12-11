<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Student extends Model
{
    protected $table = 'students';
    use HasFactory;
    use SoftDeletes;
    public function guardian() {
        return $this->belongsTo(Guardian::class, 'parent_id', 'id');
    }

    public function admin() {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function purchase()
    {
        return $this->hasOne(Purchase::class, 'student_id', 'id');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'student_id', 'id');
    }
}
