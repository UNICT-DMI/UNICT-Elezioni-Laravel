<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('organo_id')->constrained();
            $table->bigInteger('seggio');
            $table->unique(['organo_id', 'seggio']);
            $table->integer('schede_bianche');
            $table->integer('schede_nulle');
            $table->integer('schede_contestate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedes');
    }
}
