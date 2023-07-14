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
        Schema::create('post', function (Blueprint $table) {
            $table->integer('idpost')->primary();
            $table->string('authorID', 10)->index('fk_post_authorID_idx');
            $table->string('title', 150)->index('title_idx');
            $table->text('content');
            $table->string('url', 200)->unique('url_UNIQUE');
            $table->timestamp('create_time')->useCurrent();
            $table->timestamp('update_time')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
};
