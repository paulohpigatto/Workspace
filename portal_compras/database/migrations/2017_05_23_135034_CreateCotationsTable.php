<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id')->nullable()->unsigned();
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->integer('payment_condition')->length(4);
            $table->float('delivery_value', 15, 2);
            $table->integer('status')->length(1);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotations');
    }
}
