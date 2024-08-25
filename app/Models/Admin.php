<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Treasuries;

class Admin extends Authenticatable
{
    protected $table = "admins";
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'com_code'
    ];
    use HasFactory;

   
}
