<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('name');
            $table->string('email');
            $table->string('full_name');
            $table->string('phone');
            $table->string('country');
            $table->string('city');
            $table->string('street')->nullable();
            $table->string('locality')->nullable();
            $table->string('address')->nullable();
            $table->string('other')->nullable();
            $table->string('delivary_system')->nullable();
            $table->string('subtotal')->nullable();
            $table->string('delivery_charge')->nullable();
            $table->string('order_status')->default(0);
            $table->string('total')->nullable();
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
}
