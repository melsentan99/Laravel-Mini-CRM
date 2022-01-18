<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Company;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;


$factory->define(Employee::class, function (Faker $faker) {

    return [
        'first_name' => $faker->firstName,
        'last_name'  => $faker->lastName,
        'company_id' => function () {
            return factory(Company::class)->create()->id;
        },
        'email'      => $faker->safeEmail,
        'phone'      => $faker->phoneNumber,
    ];
});
