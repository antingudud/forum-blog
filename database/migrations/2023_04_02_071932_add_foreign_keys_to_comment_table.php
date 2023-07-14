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
        Schema::table('comment', function (Blueprint $table) {
            $table->foreign(['parentID'], 'fk_comment_parentID')->references(['idpost'])->on('post')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['authorID'], 'fk_comment_authorID')->references(['UID'])->on('user')->onUpdate('CASCADE')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comment', function (Blueprint $table) {
            $table->dropForeign('fk_comment_parentID');
            $table->dropForeign('fk_comment_authorID');
        });
    }
};
