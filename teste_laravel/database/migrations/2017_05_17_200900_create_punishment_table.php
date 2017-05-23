<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePunishmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('punishments', function (Blueprint $table) {
          $table->increments('id', 10);
          $table->string('name', 50);
          $table->integer('weight')->length(3);
          $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('punishment', function (Blueprint $table) {
            //
        });
    }
}
