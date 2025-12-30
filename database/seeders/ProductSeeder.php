<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'user_id' => 0,  
            'name' => '鉛筆',
            'description' => '描きやすい鉛筆です',
            'image_path' => 'images/pen_enpitsu_mark.png',
            'price' => 200,
            'stock' => 100,
        ]);

        Product::create([
            'user_id' => 0,
            'name' => 'イヤホン',
            'description' => 'ワイヤレスです。',
            'image_path' => 'images/music_earphone_kotsudendou.png',
            'price' => 1000,
            'stock' => 50,
        ]);

        Product::create([
            'user_id' => 0,
            'name' => 'タブレット',
            'description' => '軽量です',
            'image_path' => 'images/ekisyou_pen_tablet.png',
            'price' => 25000,
            'stock' => 20,
        ]);

        Product::create([
            'user_id' => 0,
            'name' => 'デスク',
            'description' => '昇降できます',
            'image_path' => 'images/desk_benkyoudukue.png',
            'price' => 30000,
            'stock' => 10,
        ]);
    }
}
