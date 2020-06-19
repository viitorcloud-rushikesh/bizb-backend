<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFreelancersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_freelancers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('role', 100)->nullable();
            $table->string('location', 150)->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('bio', 600)->nullable();
            $table->json('skills')->nullable();
            $table->foreignId('expertise_id')->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('rate_currency')->nullable()->comment('1 : Dollar');
            $table->decimal('rate', 10, 2)->nullable();
            $table->unsignedTinyInteger('rate_type')->nullable()->comment('1 : Hourly');
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
        Schema::dropIfExists('user_freelancers');
    }
}
