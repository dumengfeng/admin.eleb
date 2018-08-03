<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admins extends Authenticatable
{
    use HasRoles;
//    protected $guard_name='web';
    //允许赋值和修改的字段
    protected $fillable = ['name','email','password'];
    //获取logo的真实地址xz
    public function img(){
        return Storage::url($this->img);
    }
}
