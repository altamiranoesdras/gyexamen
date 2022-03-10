<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClienteProcutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cliente_procutos', function (Blueprint $table) {
            $table->foreign('cliente_id', 'fk_cliente_procutos_clientes1')->references('id')->on('clientes')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('producto_tipo_id', 'fk_cliente_procutos_producto_tipos1')->references('id')->on('producto_tipos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('producto_id', 'fk_cliente_procutos_productos1')->references('id')->on('productos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('usuario_crea', 'fk_cliente_procutos_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('usuario_actualiza', 'fk_cliente_procutos_users2')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cliente_procutos', function (Blueprint $table) {
            $table->dropForeign('fk_cliente_procutos_clientes1');
            $table->dropForeign('fk_cliente_procutos_producto_tipos1');
            $table->dropForeign('fk_cliente_procutos_productos1');
            $table->dropForeign('fk_cliente_procutos_users1');
            $table->dropForeign('fk_cliente_procutos_users2');
        });
    }
}
