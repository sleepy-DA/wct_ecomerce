<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            // REMOVE this line: $table->id();
            // Add other fields only if they don't already exist
            if (!Schema::hasColumn('order_items', 'order_id')) {
                $table->foreignId('order_id')->constrained()->onDelete('cascade');
            }

            if (!Schema::hasColumn('order_items', 'product_id')) {
                $table->foreignId('product_id')->constrained()->onDelete('cascade');
            }

            if (!Schema::hasColumn('order_items', 'quantity')) {
                $table->integer('quantity');
            }

            if (!Schema::hasColumn('order_items', 'price')) {
                $table->decimal('price', 10, 2);
            }

            if (!Schema::hasColumn('order_items', 'created_at')) {
                $table->timestamps();
            }
        });
    }

    public function down(): void
    {
        // Do not drop the whole table in down(); just reverse changes
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['product_id']);
            $table->dropColumn(['order_id', 'product_id', 'quantity', 'price']);
            $table->dropTimestamps();
        });
    }
};
