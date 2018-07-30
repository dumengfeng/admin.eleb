<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * id	primary	主键
    goods_name	string	名称
    rating	float	评分
    shop_id	int	所属商家ID
    category_id	int	所属分类ID
    goods_price	float	价格
    description	string	描述
    month_sales	int	月销量
    rating_count	int	评分数量
    tips	string	提示信息
    satisfy_count	int	满意度数量
    satisfy_rate	float	满意度评分
    goods_img	string	商品图片

     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('goods_name');
            $table->string('rating');
            $table->Integer('shop_id');
            $table->Integer('category_id');
            $table->decimal('goods_price');
            $table->string('description');
            $table->Integer('month_sales');
            $table->Integer('rating_count');
            $table->string('tips');
            $table->Integer('satisfy_count');
            $table->float('satisfy_rate');
            $table->string('goods_img');
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
        Schema::dropIfExists('menus');
    }
}
