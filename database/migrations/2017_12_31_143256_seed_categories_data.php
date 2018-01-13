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
                'name'        => '无处安放',
                'slug'        => 'uncategorized',
                'description' => '难道必须为我每一篇文章都有一个准确的分类吗？No。',
            ],
            [
                'name'        => 'PHP',
                'slug'        => 'php',
                'description' => '这是一种开发语言。',
            ],
            [
                'name'        => 'WordPress',
                'slug'        => 'wordpress',
                'description' => 'WordPress是世界上最大的博客软件，同时也是一款内容管理系统（CMS），它简单易用，所以特别流行。',
            ],
            [
                'name'        => '用户增长',
                'slug'        => 'growth',
                'description' => '请保持友善，互帮互助',
            ],
            [
                'name'        => '日常随笔',
                'slug'        => 'essay',
                'description' => '偶尔觉得我应该要成为一个作家的。',
            ],
            [
                'name'        => '知识管理',
                'slug'        => 'knowledge-management',
                'description' => '学习必须要要建立知识体系。',
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
