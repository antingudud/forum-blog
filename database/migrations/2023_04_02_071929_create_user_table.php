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
        Schema::create('user', function (Blueprint $table) {
            $table->string('UID', 10)->primary();
            $table->string('username', 16)->unique('username_UNIQUE');
            $table->string('email')->unique('email_UNIQUE');
            $table->string('password', 60);
            $table->timestamp('create_time')->useCurrent();
            $table->timestamp('update_time')->useCurrentOnUpdate()->nullable();
            $table->string('authority', 14)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
