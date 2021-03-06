<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\SubCategory::class, function (Faker $faker) {
    return [
        'sub_category' => $faker->jobTitle
    ];
});
