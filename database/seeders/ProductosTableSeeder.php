<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('productos')->delete();
        
        \DB::table('productos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tipo_id' => 1,
                'nombre' => 'Corriente',
                'created_at' => '2022-03-10 15:10:28',
                'updated_at' => '2022-03-10 15:10:28',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'tipo_id' => 1,
                'nombre' => 'Plazo Fijo',
                'created_at' => '2022-03-10 15:10:39',
                'updated_at' => '2022-03-10 15:10:39',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'tipo_id' => 1,
                'nombre' => 'Programado',
                'created_at' => '2022-03-10 15:10:46',
                'updated_at' => '2022-03-10 15:10:46',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'tipo_id' => 2,
                'nombre' => 'Agricultura',
                'created_at' => '2022-03-10 15:12:33',
                'updated_at' => '2022-03-10 15:12:33',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'tipo_id' => 2,
                'nombre' => 'Comercio',
                'created_at' => '2022-03-10 15:18:00',
                'updated_at' => '2022-03-10 15:52:15',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'tipo_id' => 2,
                'nombre' => 'Consumo',
                'created_at' => '2022-03-10 15:52:32',
                'updated_at' => '2022-03-10 15:52:32',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'tipo_id' => 2,
                'nombre' => 'Vivienda',
                'created_at' => '2022-03-10 15:52:45',
                'updated_at' => '2022-03-10 15:52:45',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'tipo_id' => 3,
                'nombre' => 'Vehículos',
                'created_at' => '2022-03-10 15:52:57',
                'updated_at' => '2022-03-10 15:52:57',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'tipo_id' => 3,
                'nombre' => 'Vida Especial',
                'created_at' => '2022-03-10 15:53:06',
                'updated_at' => '2022-03-10 15:53:06',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'tipo_id' => 3,
                'nombre' => 'Vida Saludable',
                'created_at' => '2022-03-10 15:53:18',
                'updated_at' => '2022-03-10 15:53:34',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}