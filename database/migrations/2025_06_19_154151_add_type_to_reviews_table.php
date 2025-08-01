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
    if (!Schema::hasColumn('reviews', 'type')) {
        Schema::table('reviews', function (Blueprint $table) {
            $table->string('type')->default('product')->after('id');
        });
    }
}

public function down()
{
    if (Schema::hasColumn('reviews', 'type')) {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
};
