<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('prizes', function (Blueprint $table) {
          $table->increments('id', 10);
          $table->string('name', 50);
          $table->integer('price')->length(11);
          $table->integer('qtd')->length(11);
          $table->string('img', 300);
          $table->string('description', 300);
          $table->integer('sla')->length(2);
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
        Schema::table('prize', function (Blueprint $table) {
            //
        });
    }
}
