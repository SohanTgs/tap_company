<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_settings', function (Blueprint $table) {
            $table->id();

            $table->float('regi_bonus',8,2)->nullable();
            $table->float('instant_bonus',8,2)->nullable();
            $table->float('ref_registration_bonus',8,2)->nullable();
            $table->float('withdraw_bonus',8,2)->nullable();
            $table->float('first_level_bonus',8,2)->nullable();
            $table->float('second_level_bonus',8,2)->nullable();
            $table->float('third_level_bonus',8,2)->nullable();


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
        Schema::dropIfExists('bonus_settings');
    }
}
