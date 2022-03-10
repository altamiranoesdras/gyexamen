<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ClienteProcuto;
use Faker\Generator as Faker;

$factory->define(ClienteProcuto::class, function (Faker $faker) {

    return [
        'cliente_id' => $this->faker->randomDigitNotNull,
        'producto_tipo_id' => $this->faker->randomDigitNotNull,
        'producto_id' => $this->faker->randomDigitNotNull,
        'fecha_contacto' => $this->faker->date('Y-m-d H:i:s'),
        'fecha_probable_adquiere' => $this->faker->word,
        'acuerdo' => $this->faker->text,
        'usuario_crea' => $this->faker->word,
        'usuario_actualiza' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
