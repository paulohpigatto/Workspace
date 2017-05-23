<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transactions', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('transaction_type')->length(1);
          $table->integer('punishment_id')->nullable()->unsigned();
          $table->integer('prize_id')->nullable()->unsigned();
          $table->integer('qtd')->length(11);
          $table->integer('recipient_id')->length(2)->unsigned();
          $table->integer('sender_id')->length(2)->unsigned();
          $table->string('description', 30)->nullable();
          $table->string('key', 255)->nullable();
          $table->foreign('punishment_id')->references('id')->on('punishments');
          $table->foreign('prize_id')->references('id')->on('prizes');
          $table->foreign('recipient_id')->references('id')->on('users');
          $table->foreign('sender_id')->references('id')->on('users');
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
        Schema::table('transaction', function (Blueprint $table) {
            //
        });
    }
}
