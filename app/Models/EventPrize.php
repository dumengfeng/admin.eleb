<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventPrize extends Model
{
    protected $table = 'event_prizes';
    protected $fillable = ([
        "id",//	primary	主键
        "events_id",//		int	活动id
        "name",//		string	奖品名称
        "description",//		text	奖品详情
        "member_id",//		int	中奖商家账号id
    ]);

    public function event()
    {
        return $this->belongsTo(Event::class,'events_id','id');
    }

    public function shops()
    {
        return $this->belongsTo(Shops::class,'member_id','id');
    }
}
