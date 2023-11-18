<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::table('order_products', function (Blueprint $table) {
            $table->integer('quantity')->nullable(false)->change();
            $table->decimal('total_amount', 8, 2)->nullable(false)->change();
        }); 
    }

    public function down()
    {
            Schema::table('order_products', function (Blueprint $table) {
            $table->integer('quantity')->nullable()->change();
            $table->decimal('total_amount', 8, 2)->nullable()->change();
        }); 
    }
};
