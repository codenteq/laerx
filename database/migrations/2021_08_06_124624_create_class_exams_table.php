<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('companyId')->index();
            $table->foreignId('periodId')->index();
            $table->foreignId('monthId')->index();
            $table->foreignId('groupId')->index();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('class_exams');
    }
}
