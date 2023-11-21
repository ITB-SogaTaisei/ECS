<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');

        // ランダムなデータを挿入
        for ($i = 0; $i < 50; $i++) {
            Product::create([
                'name' => '商品_' . $faker->unique()->word,
                'description' => $faker->realText(100),
                'price' => $faker->numberBetween(100, 1000),
                'stock' => $faker->numberBetween(1, 100),

                // php artisan db:seed --class=ProductSeeder
            ]);
        }
    }
}
