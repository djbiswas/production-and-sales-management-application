<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('store');
            $table->string('invoice');
            $table->string('shipping_address');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')
                ->on('customers')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
                ->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->decimal('buy', 25, 2);
            $table->decimal('total_qty', 25, 2);
            $table->decimal('subtotal', 25, 2);
            $table->decimal('discount', 25, 2);
            $table->decimal('vat', 25, 2);
            $table->decimal('netTotal', 25, 2);
            $table->decimal('word', 25, 2);
            $table->decimal('paid', 25, 2);
            $table->decimal('due', 25, 2);
            $table->string('status');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
