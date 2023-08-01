<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'art_title' => 'brownies yang enak dan lezat',
            'art_slug' => 'brownies-yang-enak-dan-lezat',
            'art_image' => '../img/b1.jpg',
            'art_excerpt' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, molestiae dignissimos excepturi quibusdam ',
            'art_content' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, molestiae dignissimos excepturi quibusdam non provident quo. Quas praesentium optio iusto minima maxime eligendi temporibus itaque eius? Expedita adipisci veniam error!',
            'art_category_id' => 1
        ]);

        DB::table('articles')->insert([
            'art_title' => 'brownies yang enak dan mantap',
            'art_slug' => 'brownies-yang-enak-dan-mantap',
            'art_image' => '../img/b2.jpg',
            'art_excerpt' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, molestiae dignissimos excepturi quibusdam ',
            'art_content' => ' Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque, molestiae dignissimos excepturi quibusdam non provident quo. Quas praesentium optio iusto minima maxime eligendi temporibus itaque eius? Expedita adipisci veniam error!',
            'art_category_id' => 2
        ]);
    }
}
