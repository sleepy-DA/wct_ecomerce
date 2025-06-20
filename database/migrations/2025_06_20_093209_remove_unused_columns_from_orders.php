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
        // Check if columns exist before trying to remove them
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
    Schema::table('orders', function (Blueprint $table) {
        // Only add back if they don't exist
        if (!Schema::hasColumn('orders', 'shipping_address')) {
            $table->string('shipping_address')->nullable();
        }
        
        if (!Schema::hasColumn('orders', 'address')) {
            $table->string('address')->nullable();
        }
    });
}
};
