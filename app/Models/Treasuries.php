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
        'added_by',
        'com_code',
        'date',
        'updated_by'
    ];

    // 'name' => $request->name,
    // 'is_master' => $request->is_master,
    // 'last_isal_exhcange' => $request->last_isal_exhcange,
    // 'last_isal_collect' => $request->last_isal_collect,
    // 'active' => $request->active,
    // 'added_by' => uth()->user()->id,
    // 'com_code' => auth()->user()->com_code,
    // 'date' => now(),
    use HasFactory;

 
}
