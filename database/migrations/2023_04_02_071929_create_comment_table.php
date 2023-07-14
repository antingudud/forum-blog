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
        Schema::create('comment', function (Blueprint $table) {
            $table->integer('idcomment')->primary();
            $table->string('authorID', 10)->index('fk_comment_authorID_idx');
            $table->integer('parentID')->index('fk_comment_parentID_idx');
            $table->text('text');
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
        Schema::dropIfExists('comment');
    }
};
