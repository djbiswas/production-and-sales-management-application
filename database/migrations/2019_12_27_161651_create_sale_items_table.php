<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('store');
            $table->string('invoice');
            $table->string('track_number');
            $table->unsignedBigInteger('sale_id');
            $table->foreign('sale_id')->references('id')
                ->on('sales')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('product_model_id');
            $table->foreign('product_model_id')->references('id')
                ->on('product_models')->onUpdate('cascade')->onDelete('cascade');
            $table->string('product_name');
            $table->integer('orderQuantity');
            $table->decimal('price',25,2);
            $table->decimal('totalPrice',25,2);
            $table->string('status')->default('0');
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
        Schema::dropIfExists('sale_items');
    }
}
