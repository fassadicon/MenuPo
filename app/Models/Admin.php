<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
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
        return $this->hasOne(Guardian::class, 'created_by', 'id');
    }

    public function parents()
    {
        return $this->hasMany(Guardian::class, 'created_by', 'id');
    }

    public function parent_updated()
    {
        return $this->hasOne(Guardian::class, 'updated_by', 'id');
    }

    public function parents_updated()
    {
        return $this->hasMany(Guardian::class, 'updated_by', 'id');
    }

    public function menuplanner()
    {
        return $this->hasOne(Menuplanner::class, 'created_by', 'id');
    }

    public function menuplanners()
    {
        return $this->hasMany(Menuplanner::class, 'created_by', 'id');
    }

    public function menuplanner_updated()
    {
        return $this->hasOne(Menuplanner::class, 'updated_by', 'id');
    }

    public function menuplanners_updated()
    {
        return $this->hasMany(Menuplanner::class, 'updated_by', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Admin')
        ->logAll()
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
        
}

