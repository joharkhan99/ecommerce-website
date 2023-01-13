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
        Schema::create('Suppliers', function (Blueprint $table) {
            $table->increments('SupplierID');
            $table->string('companyname', 255);
            $table->string('fname', 255);
            $table->string('lname', 255);
            $table->text('address');
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('postalcode', 20);
            $table->string('country', 200);
            $table->string('phone', 255);
            $table->string('email', 255);
            $table->text('paymentmethods');
            $table->text('logo');
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
        Schema::dropIfExists('Suppliers');
    }
};
