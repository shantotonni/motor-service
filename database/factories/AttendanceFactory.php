<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\App\Attendance;
use Faker\Generator as Faker;

$factory->define(App\Attendance::class, function (Faker $faker) {
    return [
                "date"=>$faker->date($format = "Y-m-d", $max = "now"),
        "employee_id"=>$faker->numberBetween(1,2),
        "in_1_time"=>$faker->date($format = "Y-m-d", $max = "now"),
        "out_1_time"=>$faker->date($format = "Y-m-d", $max = "now"),
        "in_2_time"=>$faker->date($format = "Y-m-d", $max = "now"),
        "out_2_time"=>$faker->date($format = "Y-m-d", $max = "now"),
        "status_id"=>$faker->numberBetween(1,2),
        "remarks"=>str_random(10),
        "shift_1_id"=>$faker->numberBetween(1,2),
        "shift_1_start"=>$faker->date($format = "Y-m-d", $max = "now"),
        "shift_1_end"=>$faker->date($format = "Y-m-d", $max = "now"),
        "shift_1_hour"=>$faker->randomNumber,
        "shift_2_id"=>$faker->numberBetween(1,2),
        "shift_2_start"=>$faker->date($format = "Y-m-d", $max = "now"),
        "shift_2_end"=>$faker->date($format = "Y-m-d", $max = "now"),
        "shift_2_hour"=>$faker->randomNumber,
        "short_excess_1"=>$faker->randomNumber,
        "short_excess_2"=>$faker->randomNumber,
        "shift_1_worked_hour"=>$faker->randomNumber,
        "shift_2_worked_hour"=>$faker->randomNumber,
        "shift_1_ot_hour"=>$faker->randomNumber,
        "shift_2_ot_hour"=>$faker->randomNumber,
        "total_ot_hour"=>$faker->randomNumber,
        "total_short_excess"=>$faker->randomNumber,
        "total_working_hour"=>$faker->randomNumber,
        "total_worked_hour"=>$faker->randomNumber,
        "leave_or_iom"=>str_random(10),
        "leave_iom_id"=>str_random(10),
        "is_process_locked"=>$faker->boolean,
        "is_final_locked"=>$faker->boolean,

    ];
});
