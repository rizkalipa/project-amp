<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'description' => $faker->text(35),
        'total_stock' => $faker->numberBetween(0, 40),
        'price' => $faker->randomFloat(750),
        'image' => '/img/produk-' . $faker->numberBetween(1, 4) . '.png',
    ];
});
