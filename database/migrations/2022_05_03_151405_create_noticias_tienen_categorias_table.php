<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticias_tienen_categorias', function (Blueprint $table) {
            $table->foreignId('noticia_id')->constrained('noticias', 'noticia_id');
            $table->unsignedSmallInteger('categoria_id');
            $table->foreign('categoria_id')->references('categoria_id')->on('categorias');
            $table->primary(['noticia_id', 'categoria_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('noticias_tienen_categorias');
    }
};
