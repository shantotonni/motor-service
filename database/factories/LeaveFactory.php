<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\App\Leave;
use Faker\Generator as Faker;

$factory->define(App\Leave::class, function (Faker $faker) {
    return [
                "employee_id"=>$faker->numberBetween(1,2),
        "year"=>$faker->date($format = "Y-m-d", $max = "now"),
        "casual"=>$faker->randomNumber,
        "sick"=>$faker->randomNumber,
        "mathernity_or_paternity_leave"=>$faker->randomNumber,
        "others"=>$faker->randomNumber,

    ];
});
