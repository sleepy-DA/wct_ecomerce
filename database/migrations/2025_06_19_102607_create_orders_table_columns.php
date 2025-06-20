<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTableColumns extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'email')) {
                $table->string('email')->after('user_id');
            }
            if (!Schema::hasColumn('orders', 'first_name')) {
                $table->string('first_name')->after('email');
            }
            if (!Schema::hasColumn('orders', 'last_name')) {
                $table->string('last_name')->after('first_name');
            }
            if (!Schema::hasColumn('orders', 'address')) {
                $table->text('address')->after('last_name');
            }
            if (!Schema::hasColumn('orders', 'city')) {
                $table->string('city')->after('address');
            }
            if (!Schema::hasColumn('orders', 'country')) {
                $table->string('country')->after('city');
            }
            if (!Schema::hasColumn('orders', 'shipping_method')) {
                $table->string('shipping_method')->after('country');
            }
            if (!Schema::hasColumn('orders', 'payment_method')) {
                $table->string('payment_method')->after('shipping_method');
            }
        });
    }

    public function down()
    {
        // No rollback needed for safety
    }
}