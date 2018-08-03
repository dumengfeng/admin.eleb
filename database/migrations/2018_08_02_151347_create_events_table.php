<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * id	primary	主键
    title	string	名称
    content	text	详情
    signup_start	int	报名开始时间
    signup_end	int	报名结束时间
    prize_date	date	开奖日期
    signup_num	int	报名人数限制
    is_prize	int	是否已开奖
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->integer('signup_start');
            $table->integer('signup_end');
            $table->date('prize_date');
            $table->integer('signup_num');
            $table->integer('is_prize');
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
        Schema::dropIfExists('events');
    }
}
