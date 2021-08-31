<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestResultTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_result_types', function (Blueprint $table) {
            $table->id();
            $table->integer('correct');
            $table->integer('in_correct');
            $table->integer('blank_question');
            $table->foreignId('testId');
            $table->foreignId('typeId');
            $table->foreignId('resultId');
            $table->foreignId('userId');
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
        Schema::dropIfExists('test_result_types');
    }
}
