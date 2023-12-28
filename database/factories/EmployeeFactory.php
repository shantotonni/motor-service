<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\App\Employee;
use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
                "name"=>$faker->name,
        "staff_id"=>str_random(10),
        "card_number"=>str_random(10),
        "employee_type_id"=>$faker->numberBetween(1,2),
        "designation_id"=>$faker->numberBetween(1,2),
        "functional_designation"=>str_random(10),
        "department_id"=>$faker->numberBetween(1,2),
        "location_id"=>$faker->numberBetween(1,2),
        "section_id"=>$faker->numberBetween(1,2),
        "level_id"=>$faker->numberBetween(1,2),
        "grade_id"=>$faker->numberBetween(1,2),
        "step_id"=>$faker->numberBetween(1,2),
        "gender_id"=>$faker->numberBetween(1,2),
        "joining_date"=>$faker->date($format = "Y-m-d", $max = "now"),
        "confirmation_date"=>$faker->date($format = "Y-m-d", $max = "now"),
        "resignation_date"=>$faker->date($format = "Y-m-d", $max = "now"),
        "retirement_date"=>$faker->date($format = "Y-m-d", $max = "now"),
        "blood_group_id"=>$faker->numberBetween(1,2),
        "is_active"=>$faker->boolean,
        "supervisor_1_id"=>$faker->numberBetween(1,2),
        "supervisor_2_id"=>$faker->numberBetween(1,2),
        "shift_id"=>$faker->numberBetween(1,2),
        "is_fixed_shift"=>$faker->boolean,
        "contract_start_date"=>$faker->date($format = "Y-m-d", $max = "now"),
        "contract_end_date"=>$faker->date($format = "Y-m-d", $max = "now"),
        "remarks"=>str_random(10),

    ];
});
