<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColBodyToContentInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('storys', function (Blueprint $table) {
                $table->renameColumn('body', 'content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('storys', function (Blueprint $table) {
            $table->renameColumn('content', 'body');
        });
    }
}
