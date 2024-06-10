<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id();
            $table->string('tax_no', 11);
            $table->string('email');
            $table->string('website_url')->nullable();
            $table->string('phone');
            $table->foreignId('countryId');
            $table->foreignId('cityId');
            $table->foreignId('stateId');
            $table->string('address', 600);
            $table->string('zip_code');
            $table->string('logo')->default('/companies/default.png');
            $table->foreignId('planId');
            $table->foreignId('companyId');
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
        Schema::dropIfExists('company_infos');
    }
}
