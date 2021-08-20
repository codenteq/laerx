<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiveLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->dateTime('live_date');
            $table->string('url');
            $table->foreignId('periodId');
            $table->foreignId('monthId');
            $table->foreignId('groupId');
            $table->foreignId('typeId');
            $table->foreignId('companyId');
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
        Schema::dropIfExists('live_lessons');
    }
}
