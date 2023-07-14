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
        Schema::table('image_group', function (Blueprint $table) {
            $table->foreign(['idpost'], 'fk_image_idpost')->references(['idpost'])->on('post')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['idimage'], 'fk_image_idimage')->references(['idimage'])->on('image')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_group', function (Blueprint $table) {
            $table->dropForeign('fk_image_idpost');
            $table->dropForeign('fk_image_idimage');
        });
    }
};
