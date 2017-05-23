<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id')->nullable()->unsigned();
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->string('description', 100);
            $table->string('unit_type', 10);
            $table->float('amount', 15, 2);
            $table->integer('cost_center')->length(10);
            $table->float('unit_value', 10, 2);
            $table->string('obs', 300);
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
        Schema::dropIfExists('ticket_materials');
    }
}
