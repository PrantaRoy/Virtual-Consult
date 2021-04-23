<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('sitename')->default('Demo');
            $table->string('cur_text')->default('USD');
            $table->string('cur_sym')->default('$');
            $table->string('efrom')->default('admin@site.com');
            $table->text('etemp');
            $table->text('mail_config');
            $table->string('smsapi')->nullable();
            $table->boolean('ev')->default(0);
            $table->boolean('en')->default(0);
            $table->boolean('sv')->default(0);
            $table->boolean('sn')->default(0);
            $table->boolean('social_login')->default(0);
            $table->boolean('reg')->default(1);
            $table->integer('alert')->default(1);
            $table->string('map')->nullable();
            $table->string('theme')->default('one');
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
        Schema::dropIfExists('general_settings');
    }
}
