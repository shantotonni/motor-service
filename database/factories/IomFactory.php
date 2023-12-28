<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\App\Iom;
use Faker\Generator as Faker;

$factory->define(App\Iom::class, function (Faker $faker) {
    return [
                "from_date"=>$faker->date($format = "Y-m-d", $max = "now"),
        "to_date"=>$faker->date($format = "Y-m-d", $max = "now"),
        "from_time_1"=>$faker->date($format = "Y-m-d", $max = "now"),
        "to_time_1"=>$faker->date($format = "Y-m-d", $max = "now"),
        "from_time_2"=>$faker->date($format = "Y-m-d", $max = "now"),
        "to_time_2"=>$faker->date($format = "Y-m-d", $max = "now"),
        "total_days"=>$faker->randomNumber,
        "reason"=>str_random(10),
        "first_approver_id"=>$faker->numberBetween(1,2),
        "second_approver_id"=>$faker->numberBetween(1,2),
        "first_approved_at"=>$faker->date($format = "Y-m-d", $max = "now"),
        "second_approved_at"=>$faker->date($format = "Y-m-d", $max = "now"),
        "employee_id"=>$faker->numberBetween(1,2),
        "creator_id"=>$faker->numberBetween(1,2),
        "is_rejected"=>$faker->boolean,
        "rejected_at"=>$faker->date($format = "Y-m-d", $max = "now"),
        "rejector_id"=>$faker->numberBetween(1,2),

    ];
});
