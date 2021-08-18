<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNudatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nudatas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fileno');
            $table->string('filename');
            $table->string('subject');
            $table->string('filecomedate');
            $table->string('filecomefrom');
            $table->string('filemark')->nullable();
            $table->string('filego')->nullable();
            $table->string('filegodate')->nullable();
            $table->string('filelawgodate')->nullable();
            $table->string('filelawcomedate')->nullable();
            $table->string('comments')->nullable();
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
        Schema::dropIfExists('nudatas');
    }
}
