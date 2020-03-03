<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_type_name');

            $table->decimal('select_sand',25,2);
            $table->decimal('white_sand',25,2);
            $table->decimal('red_color',25,2);
            $table->decimal('yellow_color',25,2);
            $table->decimal('black_color',25,2);
            $table->decimal('chemical_color',25,2);
            $table->decimal('cement',25,2);
            $table->decimal('stone',25,2);

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
        Schema::dropIfExists('product_types');
    }
}
