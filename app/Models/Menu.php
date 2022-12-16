<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
class Menu extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $table = 'menus';
    // Relationship To User
    public function admin() {
        return $this->belongsTo(Admin::class, 'created_by', 'id');
    }

    public function food() {
        return $this->belongsTo(Food::class, 'food_id', 'id');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Menu')
        ->logAll()
        ->logOnlyDirty()
        ->dontSubmitEmptyLogs();
    }
}
