<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Philfct extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'philfcts';
    public $incrementing = false;


    public function food()
    {
        return $this->hasOne(Food::class, 'philfct_id', 'id');
    }

    public function foods()
    {
        return $this->hasMany(Food::class, 'philfct_id', 'id');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Philfct')
        ->logAll()
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
}
