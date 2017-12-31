<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedTagsData extends Migration
{
    public function up()
    {
        $tags = [
            [
                'name'        => '默认标签',
                'slug'        => 'default-tag',
                'description' => '这是一个标签。',
            ],
            [
                'name'        => '增长黑客',
                'slug'        => 'growth-hacking',
                'description' => '增长黑客的技巧。',
            ],
            [
                'name'        => '首席增长官',
                'slug'        => 'cgo',
                'description' => '可口可乐设置CGO。',
            ],
        ];

        DB::table('tags')->insert($tags);
    }

    public function down()
    {
        DB::table('tags')->truncate();
    }
}