<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Trackerinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Trackerinfo', function (Blueprint $table) {
            $table->id();
            $table->text('IP')->unique()->comment("User public IP");
            $table->text("ActiveDomain")->nullable()->comment("User Active Domain");
            $table->text("TemplateName")->comment("Pirated Template");
            $table->text("browserName")->comment("User Broswer Name");
            $table->text("browserVersion")->comment("User Broswer Version");
            $table->text("city")->comment("User city");
            $table->text("country")->comment("User country");
            $table->text("continent")->comment("User continent");
            $table->boolean('stage')->default(0)->comment("Stage of the template");
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
        //
    }
}
