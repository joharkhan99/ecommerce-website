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
        Schema::create('OrderDetails', function (Blueprint $table) {
            $table->unsignedInteger('orderid');
            $table->unsignedInteger('productid');
            // $table->unsignedInteger('ordernumber', 50);
            $table->string('ordernumber', 32)->references('ordernumber')->on('Orders');


            $table->string('price', 200);
            $table->integer('quantity');
            $table->string('discount', 200);
            $table->string('total', 200);
            $table->string('phone', 20);
            $table->timestamps();


            $table->foreign('orderid')->references('OrderID')->on('Orders')->onDelete('cascade');
            $table->foreign('productid')->references('ProductID')->on('Products')->onDelete('cascade');
            // $table->foreign('ordernumber')->references('ordernumber')->on('Orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('OrderDetails');
    }
};
