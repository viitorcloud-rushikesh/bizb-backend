<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title', 100)->nullable();
            $table->string('description', 600)->nullable();
            $table->json('skills')->nullable();
            $table->json('experience_level')->nullable();
            $table->unsignedTinyInteger('job_type')->nullable();
            $table->unsignedTinyInteger('payment_type')->nullable();
            $table->unsignedTinyInteger('rate_currency')->nullable()->comment('1 : Dollar');
            $table->decimal('rate', 10, 2)->nullable();
            $table->unsignedTinyInteger('rate_type')->nullable()->comment('1 : Hourly');
            $table->unsignedTinyInteger('work_type')->nullable();
            $table->timestamp('job_validity_date')->nullable();
            $table->timestamp('job_expired_date')->nullable();
            $table->unsignedTinyInteger('status')->nullable();
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
        Schema::dropIfExists('user_jobs');
    }
}
