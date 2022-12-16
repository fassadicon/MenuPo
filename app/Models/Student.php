<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Student extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'students';
    
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

    public function bmi()
    {
        return $this->belongsTo(Bmi::class, 'bmi_id', 'id');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Student')
        ->logAll()
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
}
