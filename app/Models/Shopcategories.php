<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Shopcategories extends Model
{
    //允许赋值和修改的字段
    protected $fillable = ['name','img','status'];
    //获取logo的真实地址
    public function img(){
        return Storage::url($this->img);
    }
}
