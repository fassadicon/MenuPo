<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admins';
    use HasFactory;
    
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'admin_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'admin_id', 'id');
    }

    public function parent()
    {
        return $this->hasOne(Parent::class, 'created_by', 'id');
    }

    public function parents()
    {
        return $this->hasMany(Parent::class, 'created_by', 'id');
    }

}
