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
        Schema::create('Customers', function (Blueprint $table) {
            $table->increments('CustomerID');
            $table->string('fname', 255);
            $table->string('lname', 255);
            $table->text('address');
            $table->string('city', 255);
            $table->string('state', 255);
            $table->string('postalcode', 20);
            $table->string('country', 200);
            $table->string('phone', 255);
            $table->string('email', 255);
            $table->unsignedInteger('userid');
            $table->text('picture');
            $table->timestamps();

            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Customers');
    }
};
