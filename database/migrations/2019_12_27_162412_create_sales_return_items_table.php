<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesReturnItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_return_items', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('sales_return_id');
            $table->foreign('sales_return_id')->references('id')
                ->on('sales_returns')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('product_model_id');
            $table->foreign('product_model_id')->references('id')
                ->on('product_models')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('sales_return_items');
    }
}
