<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('cnpj',20)->unique()->nullable();
            $table->integer('role')->length(1);
            $table->string('category',30)->nullable();
            $table->string('email', 70)->unique()->nullable();
            $table->string('password', 255);
            $table->string('country', 50)->nullable();
            $table->integer('cod_country')->length(3)->nullable();
            $table->integer('cod_area')->length(3)->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('address', 300)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
