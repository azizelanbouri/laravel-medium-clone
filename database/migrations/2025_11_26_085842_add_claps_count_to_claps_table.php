<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('claps', function (Blueprint $table) {
            $table->integer('claps_count')->default(1)->after('post_id');
        });
    }

    public function down()
    {
        Schema::table('claps', function (Blueprint $table) {
            $table->dropColumn('claps_count');
        });
    }
};