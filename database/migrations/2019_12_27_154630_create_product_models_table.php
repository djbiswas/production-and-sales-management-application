<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_models', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_type_id');
            $table->string('product_model_name');
            $table->unsignedBigInteger('stock_item_group_id');
            $table->unsignedBigInteger('tax_category_id');
            $table->unsignedBigInteger('stock_unit_id');

            $table->string('model_description')->nullable();
            $table->foreign('product_type_id')->references('id')
                ->on('product_types')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('stock_item_group_id')->references('id')
                ->on('stock_item_groups')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('tax_category_id')->references('id')
                ->on('tax_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('stock_unit_id')->references('id')
                ->on('stock_units')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('product_models');
    }
}
