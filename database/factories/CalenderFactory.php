<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\App\Calender;
use Faker\Generator as Faker;

$factory->define(App\Calender::class, function (Faker $faker) {
    return [
                "date"=>$faker->date($format = "Y-m-d", $max = "now"),
        "location_id"=>$faker->numberBetween(1,2),
        "department_id"=>$faker->numberBetween(1,2),
        "is_leave"=>$faker->boolean,
        "remark"=>str_random(10),

    ];
});
