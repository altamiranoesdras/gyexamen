<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductoTiposTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('producto_tipos')->delete();
        
        \DB::table('producto_tipos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nombre' => 'AHORRO',
                'created_at' => '2022-03-10 15:08:13',
                'updated_at' => '2022-03-10 15:08:13',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'nombre' => 'PRESTAMOS',
                'created_at' => '2022-03-10 15:08:27',
                'updated_at' => '2022-03-10 15:08:27',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'nombre' => 'SEGUROS',
                'created_at' => '2022-03-10 15:08:32',
                'updated_at' => '2022-03-10 15:08:32',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}