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
        'created_at',
        'updated_at',
        'added_by',
        'updated_by',
        'com_code',
        'date'
    ];
    use HasFactory;
}
