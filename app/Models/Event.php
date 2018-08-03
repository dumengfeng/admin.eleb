<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /*id	primary	主键
title	string	名称
content	text	详情
signup_start	int	报名开始时间
signup_end	int	报名结束时间
prize_date	date	开奖日期
signup_num	int	报名人数限制
is_prize	int	是否已开奖*/
    protected $table = 'events';
    protected $fillable = ([
        "id",//	primary	主键
        "title",//		string	名称
        "content",//		text	详情
        "signup_start",//		int	报名开始时间
        "signup_end",//		int	报名结束时间
        "prize_date",//		date	开奖日期
        "signup_num",//		int	报名人数限制
        "is_prize",//		int	是否已开奖
    ]);
}
