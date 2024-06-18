<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCategories extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('table_categories', function (Blueprint $table) {
            $table->id(); // This will create an auto-incrementing primary key column `id`
            $table->unsignedBigInteger('product_category_code');
            $table->string('category_name');
            $table->timestamps();

            // Define `product_category_code` as a unique key
            $table->unique('product_category_code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('table_categories');
    }
}
