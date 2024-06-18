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
        Schema::table('table_products', function (Blueprint $table) {
            $table->unsignedBigInteger('product_category_code')->nullable()->after('id');
            $table->foreign('product_category_code')->references('product_category_code')->on('table_categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_products', function (Blueprint $table) {
            $table->dropForeign(['product_category_code']);
            $table->dropColumn('product_category_code');
        });
    }
};