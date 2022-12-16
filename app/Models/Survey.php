<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
class Survey extends Model
{
    use HasFactory, LogsActivity;
    protected $table = 'surveys';
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Survey')
        ->logAll()
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
    
}
