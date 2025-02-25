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
        //creamos la tabla tasks
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();  //clave primaria autoincremental por defecto
            $table->string('title'); //campo para el titulo de la tarea
            $table->text('description')->nullable(); //campo para la descripcion
            $table->timestamps(); //campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
