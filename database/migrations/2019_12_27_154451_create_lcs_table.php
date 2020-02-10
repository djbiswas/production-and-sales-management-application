<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lcs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('name');
            $table->unsignedBigInteger('bank_account_id');
            $table->foreign('bank_account_id')->references('id')
                ->on('bank_accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('amount');
            $table->decimal('price',25,2);
            $table->string('note');
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
        Schema::dropIfExists('lcs');
    }
}
