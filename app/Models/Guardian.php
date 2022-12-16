<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Guardian extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;
    protected $table = 'parents';
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
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Guardian')
        ->logAll()
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
}
