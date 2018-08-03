<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventMember extends Model
{
    protected $table = 'event_members';
    protected $fillable = ([
        "id",    //primary	主键
        "events_id",    //	int	活动id
        "member_id",    //	int	商家账号id
    ]);
}
