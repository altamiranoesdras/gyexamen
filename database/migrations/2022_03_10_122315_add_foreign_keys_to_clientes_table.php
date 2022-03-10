<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->foreign('departamento_id', 'fk_clientes_departamentos1')->references('id')->on('departamentos')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('municipio_id', 'fk_clientes_municipios1')->references('id')->on('municipios')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('usuario_crea', 'fk_clientes_users1')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('usuario_actualiza', 'fk_clientes_users2')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign('fk_clientes_departamentos1');
            $table->dropForeign('fk_clientes_municipios1');
            $table->dropForeign('fk_clientes_users1');
            $table->dropForeign('fk_clientes_users2');
        });
    }
}
