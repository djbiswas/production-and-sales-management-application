<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_category_name');
            $table->string('product_category_description')->nullable();
            $table->timestamps();
        });

           // product_model  //product_category_product_model
        Schema::create('product_model', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('model_id');
            $table->foreign('category_id')
                ->references('id')->on('product_categories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('model_id')
                ->references('id')->on('product_models')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->unique(['category_id','model_id']);
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
        Schema::dropIfExists('product_categories');
    }
}
