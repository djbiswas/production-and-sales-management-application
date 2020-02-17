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
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('product_type_id')->nullable();
            $table->string('product_model_name');
            $table->double('unitPrice',25,2)->default('0');
            $table->double('sellPrice',25,2)->default('0');
            $table->bigInteger('quantity')->default('0');

            $table->unsignedBigInteger('stock_item_group_id')->nullable();
            $table->unsignedBigInteger('tax_category_id')->nullable();
            $table->unsignedBigInteger('stock_unit_id')->nullable();


            $table->string('model_description')->nullable();
            $table->foreign('product_type_id')->references('id')
                ->on('product_types')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('stock_item_group_id')->references('id')
                ->on('stock_item_groups')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('tax_category_id')->references('id')
                ->on('tax_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('stock_unit_id')->references('id')
                ->on('stock_units')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('lc_id')->references('id')
                ->on('lcs')->onUpdate('cascade')->onDelete('cascade');

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
