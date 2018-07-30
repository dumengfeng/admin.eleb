<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * id	primary	主键
    order_id	int	订单id
    goods_id	int	商品id
    amount	int	商品数量
    goods_name	string	商品名称
    goods_img	string	商品图片
    goods_price	decimal	商品价格

     */
    public function up()
    {
        Schema::create('order_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('goods_id');
            $table->integer('amount');
            $table->string('goods_name');
            $table->string('goods_img');
            $table->decimal('goods_price');
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
        Schema::dropIfExists('order_goods');
    }
}
