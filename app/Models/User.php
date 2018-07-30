<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class User extends Model
{
    //允许赋值和修改的字段
    protected $fillable = ['name','email','password','shop_category_id','shop_name','shop_img','brand','on_time','fengniao','bao','piao','zhun','start_send','send_cost','notice','discount','status','shop_id'];
    //获取logo的真实地址
    public function img(){
        return Storage::url($this->img);
    }
    public function shops()
    {
        return $this->hasOne(Shops::class,'id','shop_id');
        //Student::class ==== 'App\Models\Student'
    }
}
