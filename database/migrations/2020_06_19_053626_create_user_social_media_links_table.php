<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSocialMediaLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_social_media_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('website', 200)->nullable();
            $table->string('instagram', 200)->nullable();
            $table->string('dribbble', 200)->nullable();
            $table->string('behance', 200)->nullable();
            $table->string('medium', 200)->nullable();
            $table->json('other')->nullable();
            $table->unsignedTinyInteger('is_for_user')->nullable()->comment('1 : User 2 : Brand');
            $table->softDeletes();
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
        Schema::dropIfExists('user_social_media_links');
    }
}
