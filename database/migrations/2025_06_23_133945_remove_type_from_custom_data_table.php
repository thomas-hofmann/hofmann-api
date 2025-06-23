<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveTypeFromCustomDataTable extends Migration
{
    public function up()
    {
        Schema::table('custom_data', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }

    public function down()
    {
        Schema::table('custom_data', function (Blueprint $table) {
            $table->string('type')->default('default');
        });
    }
}