<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');

            $table->unsignedBigInteger('product_model_id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('user_id');
            $table->string('currency');
            $table->decimal('lc', 25, 4);
            $table->decimal('total_bdt', 25, 4);
            $table->decimal('quantity', 25, 4);
            $table->decimal('unit_price', 25, 4);
            $table->decimal('unit_price', 25, 4);
            $table->decimal('other_costs', 25, 4);

            $table->foreign('product_model_id')->references('id')
                ->on('product_models')->onUpdate('cascade')->onDelete('cascade');



            $table->foreign('supplier_id')->references('id')
                ->on('suppliers')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('user_id')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('material_purchases');
    }
}
