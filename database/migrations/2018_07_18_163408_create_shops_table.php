<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * id	primary	主键
    shop_category_id	int	店铺分类ID
    shop_name	string	名称
    shop_img	string	店铺图片
    shop_rating	float	评分
    brand	boolean	是否是品牌
    on_time	boolean	是否准时送达
    fengniao	boolean	是否蜂鸟配送
    bao	boolean	是否保标记
    piao	boolean	是否票标记
    zhun	boolean	是否准标记
    start_send	float	起送金额
    send_cost	float	配送费
    notice	string	店公告
    discount	string	优惠信息
    status	int	状态:1正常,0待审核,-1禁用
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('shop_category_id');
            $table->string('shop_name');
            $table->string('shop_img');
            $table->float('shop_rating',8,2);
            $table->boolean('brand');
            $table->boolean('on_time');
            $table->boolean('fengniao');
            $table->boolean('bao');
            $table->boolean('piao');
            $table->boolean('zhun');
            $table->float('start_send',8,2);
            $table->float('send_cost',8,2);
            $table->string('notice');
            $table->string('discount');
            $table->Integer('status');
            $table->engine = 'InnoDB';
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
