<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prod1 = [
            'name' => 'PHP Dasar',
            'image' => 'book1.png',
            'price' => 50000,
            'description' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum '
        ];
        $prod2 = [
            'name' => 'Codeigniter Dasar',
            'image' => 'book2.png',
            'price' => 80000,
            'description' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum '
        ];
        $prod3 = [
            'name' => 'Laravel Dasar',
            'image' => 'book3.png',
            'price' => 100000,
            'description' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum '
        ];
        $prod4 = [
            'name' => 'HTML Dasar',
            'image' => 'book4.png',
            'price' => 30000,
            'description' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum '
        ];
        $prod5 = [
            'name' => 'CSS Dasar',
            'image' => 'book5.png',
            'price' => 40000,
            'description' => 'lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum '
        ];

        App\Product::create($prod1);
        App\Product::create($prod2);
        App\Product::create($prod3);
        App\Product::create($prod4);
        App\Product::create($prod5);
    }
}
