<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Guardian extends Model
{
    protected $table = 'parents';
    use HasFactory;
    use SoftDeletes;
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function admin() {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function admin_updated() {
        return $this->belongsTo(Admin::class, 'updated_by', 'id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'parent_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'parent_id', 'id');
    }

    public function purchase()
    {
        return $this->hasOne(Purchase::class, 'parent_id', 'id');
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class, 'parent_id', 'id');
    }
}
