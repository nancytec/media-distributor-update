<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChurchFileLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('church_file_links', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('slug');
            $table->string('church_id');
            $table->string('link')->nullable();
            $table->integer('media_id');
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
        Schema::dropIfExists('church_file_links');
    }
}
