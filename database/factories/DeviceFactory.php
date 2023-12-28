<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\App\Device;
use Faker\Generator as Faker;

$factory->define(App\Device::class, function (Faker $faker) {
    return [
                "name"=>$faker->name,
        "ip"=>str_random(10),
        "part_no"=>str_random(10),
        "is_active"=>$faker->boolean,
        "location_id"=>$faker->numberBetween(1,2),
        "location_name"=>str_random(10),
        "device_type"=>str_random(10),
        "model"=>str_random(10),
        "mac"=>str_random(10),

    ];
});
