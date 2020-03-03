<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('date');

            $table->unsignedBigInteger('product_model_id')->nullable();
            $table->foreign('product_model_id')->references('id')
                ->on('product_models')->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('product_type_id')->nullable();
            $table->foreign('product_type_id')->references('id')
                ->on('product_types')->onUpdate('cascade')->onDelete('cascade');


            $table->decimal('select_sand',25,2);
            $table->decimal('white_sand',25,2);
            $table->decimal('red_color',25,2);
            $table->decimal('yellow_color',25,2);
            $table->decimal('black_color',25,2);
            $table->decimal('chemical_color',25,2);
            $table->decimal('cement',25,2);
            $table->decimal('stone',25,2);

            $table->decimal('quantity',25,2);
            $table->decimal('cost',25,'2');

            $table->string('note')->nullable();

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
        Schema::dropIfExists('manufacturers');
    }
}
