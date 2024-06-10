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
            $table->string('phone', 300)->nullable();
            $table->string('address', 600)->nullable();
            $table->boolean('status')->default(1);
            $table->foreignId('periodId')->nullable();
            $table->foreignId('monthId')->nullable();
            $table->foreignId('groupId')->nullable();
            $table->foreignId('languageId')->default(1);
            $table->string('photo')->default('/images/avatar.svg');
            $table->foreignId('companyId')->nullable();
            $table->foreignId('userId')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
