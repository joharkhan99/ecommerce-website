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
        Schema::create('Orders', function (Blueprint $table) {

            $table->increments('OrderID');

            $table->unsignedInteger('customerid');
            $table->unsignedInteger('shipperid');
            $table->unsignedInteger('paymentid');

            $table->string('ordernumber', 32)->index();
            $table->date('orderdate');
            $table->date('shipdate');
            $table->string('deleted', 20);
            $table->timestamps();

            $table->foreign('customerid')->references('CustomerID')->on('Customers')->onDelete('cascade');
            $table->foreign('paymentid')->references('PaymentID')->on('Payment')->onDelete('cascade');
            $table->foreign('shipperid')->references('ShipperID')->on('Shippers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Orders');
    }
};
