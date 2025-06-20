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
        $table->string('email')->after('user_id');
        $table->string('first_name')->after('email');
        $table->string('last_name')->after('first_name');
        $table->text('address')->after('last_name');
        $table->string('city')->after('address');
        $table->string('country')->after('city');
        $table->string('shipping_method')->after('country');
        $table->string('payment_method')->after('shipping_method');
    });
}

public function down()
{
    Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn([
            'email',
            'first_name',
            'last_name',
            'address',
            'city',
            'country',
            'shipping_method',
            'payment_method'
        ]);
    });
}
};
