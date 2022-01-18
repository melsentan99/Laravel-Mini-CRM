<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Company;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

$factory->define(Company::class, function (Faker $faker) {

    return [
        'name'       => $faker->company,
        'email'      => $faker->email,
        'website'    => 'https://'.$faker->domainName,
    ];
});
