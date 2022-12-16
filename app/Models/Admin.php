<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    use SoftDeletes;
    use LogsActivity;
    protected $table = 'admins';
    
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

    public function parent_updated()
    {
        return $this->hasOne(Parent::class, 'updated_by', 'id');
    }

    public function parents_updated()
    {
        return $this->hasMany(Parent::class, 'updated_by', 'id');
    }

    return LogOptions::defaults() {
        >useLogName('User')
        ->logAll()
        ->logOnlyDirty();
    }
        
        
}

