<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClienteProcutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_procutos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cliente_id')->index('fk_cliente_procutos_clientes1_idx');
            $table->unsignedInteger('producto_tipo_id')->index('fk_cliente_procutos_producto_tipos1_idx');
            $table->unsignedInteger('producto_id')->index('fk_cliente_procutos_productos1_idx');
            $table->dateTime('fecha_contacto');
            $table->date('fecha_probable_adquiere');
            $table->text('acuerdo');
            $table->unsignedBigInteger('usuario_crea')->index('fk_cliente_procutos_users1_idx');
            $table->unsignedBigInteger('usuario_actualiza')->index('fk_cliente_procutos_users2_idx');
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
        Schema::dropIfExists('cliente_procutos');
    }
}
