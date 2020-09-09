<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artigos', function (Blueprint $table) {
            $table->id();
            $table->string('nome_veiculo',255);
            $table->mediumText('link');
            $table->string('ano',6);
            $table->string("portas",255);
            $table->string('combustivel',25);
            $table->string("quilometragem",255);
            $table->string("cambio",25);
            $table->string("cor",50);
            $table->timestamps();
            
            $table->bigInteger('id_usuario')->unsigned()->nullable();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artigos');
    }
}
