<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Municipio;
use Faker\Generator as Faker;

$factory->define(Municipio::class, function (Faker $faker) {

    return [
        'departamento_id' => $this->faker->randomDigitNotNull,
        'nombre' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
