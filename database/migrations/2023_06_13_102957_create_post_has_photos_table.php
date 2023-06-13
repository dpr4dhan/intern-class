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
        Schema::create('post_has_photos', function (Blueprint $table) {
            $table->id();
            $table->string('caption');
            $table->string('photo');
            $table->bigInteger('post_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('post_has_photos', function (Blueprint $table) {
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_has_photos');
    }
};
