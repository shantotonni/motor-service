<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\App\LeaveApplication;
use Faker\Generator as Faker;

$factory->define(App\LeaveApplication::class, function (Faker $faker) {
    return [
                "leave_type_id"=>$faker->numberBetween(1,2),
        "employee_id"=>$faker->numberBetween(1,2),
        "is_half_day"=>$faker->boolean,
        "from_date"=>$faker->date($format = "Y-m-d", $max = "now"),
        "to_date"=>$faker->date($format = "Y-m-d", $max = "now"),
        "from_time"=>$faker->date($format = "Y-m-d", $max = "now"),
        "to_time"=>$faker->date($format = "Y-m-d", $max = "now"),
        "description"=>str_random(10),
        "first_approver_id"=>$faker->numberBetween(1,2),
        "second_approver_id"=>$faker->numberBetween(1,2),
        "first_approved_at"=>$faker->date($format = "Y-m-d", $max = "now"),
        "second_approved_at"=>$faker->date($format = "Y-m-d", $max = "now"),
        "total_days"=>$faker->randomNumber,
        "creator_id"=>$faker->numberBetween(1,2),
        "is_rejected"=>$faker->boolean,
        "rejected_at"=>$faker->date($format = "Y-m-d", $max = "now"),
        "rejector_id"=>$faker->numberBetween(1,2),

    ];
});
