<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawpurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawpurchases', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('date');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');


            $table->unsignedBigInteger('rawmaterial_id');
            $table->foreign('rawmaterial_id')->references('id')
                ->on('rawmaterials')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')
                ->on('suppliers')->onUpdate('cascade')->onDelete('cascade');

            $table->decimal('quantity', 25, 4);
            $table->decimal('unitprice', 25, 4);
            $table->decimal('price', 25, 4);
            $table->decimal('cost', 25, 4);

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
        Schema::dropIfExists('rawpurchases');
    }
}
