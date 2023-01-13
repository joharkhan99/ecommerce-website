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
        Schema::create('Products', function (Blueprint $table) {
            $table->increments('ProductID');
            $table->text('productname');
            $table->text('productdescp');
            $table->unsignedInteger('supplierid');
            $table->unsignedInteger('categoryid');
            $table->string('gender', 20);
            $table->integer('quantity');
            $table->string('price', 200);
            $table->string('discount', 200);
            $table->string('productavailable', 20);
            $table->string('discountavailable', 20);
            $table->text('picture');
            $table->float('ranking');
            $table->timestamps();
            $table->foreign('supplierid')->references('SupplierID')->on('Suppliers')->onDelete('cascade');
            $table->foreign('categoryid')->references('CategoryID')->on('Category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Products');
    }
};
