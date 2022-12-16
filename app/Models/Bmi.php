<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bmi extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'bmis';
    public function student() {
        return $this->hasOne(Student::class, 'bmi_id', 'id');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('BMI')
        ->logAll()
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
}
