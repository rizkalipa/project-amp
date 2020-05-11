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
        $product = \App\Product::make([
            'name' => 'Produk Baru',
            'description' => 'Produk kami paling baru',
            'price' => '45000',
        ])->save();
    }
}
