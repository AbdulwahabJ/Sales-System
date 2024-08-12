<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPanelSetting extends Model
{
    use HasFactory;
    protected $table = 'admin_panel_settings';
    protected $fillable = [
        'system_name',
        'photo',
        'active',
        'general_alert',
        'address',
        'phone',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
        'com_code'
    ];
}
