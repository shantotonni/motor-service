<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\App\Shift;
use Faker\Generator as Faker;

$factory->define(App\Shift::class, function (Faker $faker) {
    return [
                "name"=>$faker->name,
        "code"=>str_random(10),
        "from_time"=>$faker->date($format = "Y-m-d", $max = "now"),
        "to_time"=>$faker->date($format = "Y-m-d", $max = "now"),
        "absent_time"=>$faker->date($format = "Y-m-d", $max = "now"),
        "half_time"=>$faker->date($format = "Y-m-d", $max = "now"),
        "total_shift_hr"=>$faker->randomNumber,

    ];
});
