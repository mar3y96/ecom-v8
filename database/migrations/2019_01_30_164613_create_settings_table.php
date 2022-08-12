<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('siteTitle')->nullable();
            $table->string('tags')->nullable();
            $table->string('description')->nullable();
            $table->text('about_ar')->nullable();
            $table->text('about_en')->nullable();
            $table->string('about_section1_image')->default('a-pic.png')->nullable();
            $table->string('about_section2_image')->default('a-pic1.png')->nullable();
            $table->text('vision_ar')->nullable();
            $table->text('vision_en')->nullable();
            $table->text('mission_en')->nullable();
            $table->text('mission_ar')->nullable();
            $table->text('goals_ar')->nullable();
            $table->text('goals_en')->nullable();
            $table->string('phone')->nullable(); 
            $table->string('phone2')->nullable(); 
            $table->string('facebook')->nullable(); 
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('site_url')->nullable();
            $table->string('site_email')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('address_en')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
