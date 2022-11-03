<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('weekly_counts', function (Blueprint $table) {
            $table->id();
            $table->string('Monday')->nullable();
            $table->string('Tuesday')->nullable();
            $table->string('Wednesday')->nullable();
            $table->string('Thursday')->nullable();
            $table->string('Friday')->nullable();
            $table->string('Saturday')->nullable();
            $table->string('Sunday')->nullable();
            $table->string('date')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
