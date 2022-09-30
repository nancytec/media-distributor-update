<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonMemberFileLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_member_file_links', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('slug');
            $table->string('unique_id');
            $table->string('password');
            $table->string('link')->nullable();
            $table->text('church_name');
            $table->text('church_address');
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
        Schema::dropIfExists('non_member_file_links');
    }
}
