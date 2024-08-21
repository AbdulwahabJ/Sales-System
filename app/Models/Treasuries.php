<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Treasuries extends Authenticatable
{
    protected $table = "treasuries";
    protected $fillable = [
        'name',
        'is_master',
        'last_isal_exhcange',
        'last_isal_collect',
        'active',
        'created_at',
        'added_by',
        'com_code',
        'date',
        'updated_at',
        'updated_by'
    ];
    use HasFactory;
}
