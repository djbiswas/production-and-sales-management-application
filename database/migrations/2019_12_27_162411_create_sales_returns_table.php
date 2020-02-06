<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_returns', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('product_model_id');
            $table->foreign('product_model_id')->references('id')
                ->on('product_models')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('sale_id');
            $table->foreign('sale_id')->references('id')
                ->on('sales')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('sale_item_id');
            $table->foreign('sale_item_id')->references('id')
                ->on('sale_items')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('qty');
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
        Schema::dropIfExists('sales_returns');
    }
}
