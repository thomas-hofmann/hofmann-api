<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryToCustomDataTable extends Migration
{
    public function up()
    {
        Schema::table('custom_data', function (Blueprint $table) {
            $table->string('category')->nullable()->after('data');
        });
    }

    public function down()
    {
        Schema::table('custom_data', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
}