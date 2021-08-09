<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->string('phone')->nullable();
            $table->string('address',600)->nullable();
            $table->boolean('status')->nullable();
            $table->foreignId('periodId')->nullable();
            $table->string('month')->nullable();
            $table->foreignId('groupId')->nullable();
            $table->foreignId('languageId')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('companyId')->nullable();
            $table->foreignId('userId')->nullable();
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
        Schema::dropIfExists('user_infos');
    }
}
