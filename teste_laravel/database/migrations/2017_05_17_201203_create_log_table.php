<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('logs', function (Blueprint $table) {
          $table->increments('id', 10);
          $table->integer('prize_id')->length(3)->unsigned();
          $table->integer('user_id')->length(3)->unsigned();
          $table->integer('transaction_id')->length(20)->unsigned();
          $table->integer('status')->length(1);
          $table->foreign('prize_id')->references('id')->on('prizes');
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('transaction_id')->references('id')->on('transactions');
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
        Schema::table('log_admin', function (Blueprint $table) {
            //
        });
    }
}
