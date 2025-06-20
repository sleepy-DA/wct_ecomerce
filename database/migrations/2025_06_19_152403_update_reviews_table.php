<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::table('reviews', function (Blueprint $table) {
        if (!Schema::hasColumn('reviews', 'type')) {
            $table->string('type')->default('product')->after('id');
        }
    });
}

public function down()
{
    Schema::table('reviews', function (Blueprint $table) {
        if (Schema::hasColumn('reviews', 'type')) {
            $table->dropColumn('type');
        }
    });
}
};
