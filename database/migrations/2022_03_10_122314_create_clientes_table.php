<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo', 45)->nullable();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('dpi', 45);
            $table->date('fecha_nacimiento');
            $table->string('telefono', 45);
            $table->string('correo')->nullable();
            $table->unsignedInteger('departamento_id')->index('fk_clientes_departamentos1_idx');
            $table->unsignedInteger('municipio_id')->index('fk_clientes_municipios1_idx');
            $table->string('direccion');
            $table->tinyInteger('no_asociado')->nullable();
            $table->unsignedBigInteger('usuario_crea')->index('fk_clientes_users1_idx');
            $table->unsignedBigInteger('usuario_actualiza')->index('fk_clientes_users2_idx');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
