<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_balances', function (Blueprint $table) {
            $table->id();

            $table->integer('sender');
            $table->integer('receiver');
            $table->float('amount',8,2);
            $table->float('charge',8,2);
            $table->string('trx');

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
        Schema::dropIfExists('transfer_balances');
    }
}
