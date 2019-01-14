<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAdvertisementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->dropColumn('image_link_embeded_or_referrel_code');
            $table->string('image_link')->nullable();
            $table->string('embed_code')->nullable();
            $table->string('referral_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->string('image_link_embeded_or_referrel_code');
            $table->dropColumn('image_link');
            $table->dropColumn('embed_code');
            $table->dropColumn('referral_code');
        });
    }
}
