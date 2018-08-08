<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $fillable = [
        "id",//	primary	主键
        "title",//	string	活动名称
        "content",//	text	活动详情
        "start_time",//	datetime	活动开始时间
        "end_time",//	datetime	活动结束时间
    ];
}
