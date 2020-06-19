<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('username')->unique();
            $table->string('mobile')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('avatar', 35)->nullable();
            $table->unsignedTinyInteger('verification_confirmed')->default(1)->comment('1 : Not confirmed, 2 : Confirmed');
            $table->unsignedTinyInteger('status')->default(1)->comment('1 : Not Active 2 : Active');
            $table->unsignedTinyInteger('type')->default(1)->comment('1 : Freelancer 2 : Brand');
            $table->unsignedTinyInteger('subscription_plan')->nullable();
            $table->unsignedTinyInteger('is_profile_verified')->default(1)->comment('1 : Need to update profile 2 : Requested 3 : Verified, 4 : Rejected');
            $table->tinyInteger('two_way_authentication')->default('1')->comment('1 : Disabled 2 : Enable');
            $table->string('timezone')->nullable();
            $table->datetime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->rememberToken();
            $table->schemalessAttributes('extra_attributes')->nullable();
            $table->userstamps();
            $table->softUserstamps();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
