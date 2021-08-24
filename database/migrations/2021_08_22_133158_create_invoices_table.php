<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->decimal('price');
            $table->decimal('discount_amount')->nullable();
            $table->decimal('total_amount')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->foreignId('companyId');
            $table->foreignId('packageId');
            $table->foreignId('couponId')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('invoices');
    }
}
