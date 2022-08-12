<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvilableToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('S_available_count')->after('size')->nullable();
            $table->integer('M_available_count')->after('S_available_count')->nullable();
            $table->integer('L_available_count')->after('M_available_count')->nullable();
            $table->integer('X_available_count')->after('L_available_count')->nullable();
            $table->integer('XX_available_count')->after('X_available_count')->nullable();
            $table->integer('3X_available_count')->after('XX_available_count')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
