<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    protected $table = "navs";
    protected $fillable = [
        "id",
        "name",
        "url",
        "pid",
        "permission_id",
    ];

    public function children()
    {
        return $this->hasMany(self::class, 'pid');
    }

    public function permission()
    {
        return $this->belongsTo(Rbac::class);
    }

    public static function html()
    {
        $html = '';


        foreach (\App\Models\Nav::where('pid', 0)->get() as $nav) {
            $chil_html = '';
            foreach ($nav->children as $v) {
                if (auth()->user()->can($v->permission->name)){
                    $chil_html .= '<li><a href="'. route($v->url).'">' . $v->name . '</a></li>';
                }
            }
            if(empty($chil_html)) {
                continue;
            }
            $html .= '<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $nav->name . '<span class="caret"></span></a>
                        <ul class="dropdown-menu">';

            $html.=$chil_html;
            $html .= '</li>
                    </ul>';
        }
        return $html;
    }
}
