<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rbac extends Model
{
    protected $table='permissions';
    protected $fillable=[
        'name',
    ];
}
