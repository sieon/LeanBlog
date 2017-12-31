<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $categories = [
            [
                'name'        => '产品经理',
                'slug'        => 'product',
                'description' => '分享创造，分享发现',
            ],
            [
                'name'        => '用户增长',
                'slug'        => 'growth',
                'description' => '开发技巧、推荐扩展包等',
            ],
            [
                'name'        => '问答',
                'slug'        => 'question',
                'description' => '请保持友善，互帮互助',
            ],
            [
                'name'        => '公告',
                'slug'        => 'announcement',
                'description' => '站点公告',
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('categories')->truncate();
    }
}