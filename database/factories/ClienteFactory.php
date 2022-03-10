<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {

    return [
        'codigo' => $this->faker->word,
        'nombres' => $this->faker->word,
        'apellidos' => $this->faker->word,
        'dpi' => $this->faker->word,
        'fecha_nacimiento' => $this->faker->word,
        'telefono' => $this->faker->word,
        'correo' => $this->faker->word,
        'departamento_id' => $this->faker->randomDigitNotNull,
        'municipio_id' => $this->faker->randomDigitNotNull,
        'direccion' => $this->faker->word,
        'no_asociado' => $this->faker->word,
        'usuario_crea' => $this->faker->word,
        'usuario_actualiza' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
