<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');          
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('payment_type');
            $table->string('payment_method')->nullable();
            $table->string('transaction_id');
            $table->string('currency');
            $table->float('amount',8,2);  
            $table->string('order_number');
            $table->string('invoice_no');
            $table->string('order_date');
            $table->string('order_month');
            $table->string('order_year');  
            $table->string('cancel_date')->nullable();        
            $table->string('status');
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
        Schema::dropIfExists('orders');
    }
};