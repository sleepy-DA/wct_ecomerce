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
    Schema::table('orders', function (Blueprint $table) {
        // Check required columns exist
        if (!Schema::hasColumn('orders', 'city')) {
            $table->string('city')->nullable();
        }
        
        if (!Schema::hasColumn('orders', 'country')) {
            $table->string('country')->nullable();
        }
        
        // Remove any problematic columns
        if (Schema::hasColumn('orders', 'shipping_address')) {
            $table->dropColumn('shipping_address');
        }
        
        if (Schema::hasColumn('orders', 'address')) {
            $table->dropColumn('address');
        }
    });
}

public function down()
{
    // Not necessary for this verification migration
}
};
