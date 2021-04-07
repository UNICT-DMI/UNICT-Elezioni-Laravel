<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotantisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votantis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('organo_id')->constrained();
            $table->unsignedBigInteger('seggio');
            $table->unique(['organo_id', 'seggio']);
            $table->integer('votanti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votantis');
    }
}
