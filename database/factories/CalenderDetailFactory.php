<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\App\CalenderDetail;
use Faker\Generator as Faker;

$factory->define(App\CalenderDetail::class, function (Faker $faker) {
    return [
                "calender_id"=>$faker->numberBetween(1,2),
        "shift_id"=>$faker->numberBetween(1,2),
        "from_time"=>$faker->date($format = "Y-m-d", $max = "now"),
        "to_time"=>$faker->date($format = "Y-m-d", $max = "now"),
        "absent_time"=>$faker->date($format = "Y-m-d", $max = "now"),
        "half_time"=>$faker->date($format = "Y-m-d", $max = "now"),
        "total_shift_hr"=>$faker->randomNumber,

    ];
});
