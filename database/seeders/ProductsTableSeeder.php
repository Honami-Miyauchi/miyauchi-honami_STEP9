<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::firstOrCreate(
            ['name' => '鉛筆'],
            [
                'user_id' => 0, 
                'description' => '描きやすい鉛筆です',
                'price' => 200,
                'image_url' => '/images/pen_enpitsu_mark.png',
                'stock' => 10,
            ]
        );

        Product::firstOrCreate(
            ['name' => 'イヤホン'],
            [
                'user_id' => 0, 
                'description' => 'ワイヤレスです。',
                'price' => 1000,
                'image_url' => '/images/music_earphone_kotsudendou.png',
                'stock' => 10,
            ]
        );

        Product::firstOrCreate(
            ['name' => 'タブレット'],
            [
                'user_id' => 0, 
                'description' => '軽量です',
                'price' => 25000,
                'image_url' => '/images/ekisyou_pen_tablet.png',
                'stock' => 10,
            ]
        );

        Product::firstOrCreate(
            ['name' => 'デスク'],
            [
                'user_id' => 0, 
                'description' => '昇降できます',
                'price' => 30000,
                'image_url' => '/images/desk_benkyoudukue.png',
                'stock' => 10,
            ]
        );
    }
}

