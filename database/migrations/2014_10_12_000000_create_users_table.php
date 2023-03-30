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
            $table->string('google_id')->nullable();
            $table->boolean('isAdmin')->default(false);
            $table->string('name');
            $table->string('prenom')->nullable();
            $table->string('cne')->nullable();
            $table->string('unv')->nullable();
            $table->string('apoge')->nullable();
            $table->string('year')->nullable();
            $table->string('role')->nullable();
            $table->string('dept')->nullable();
            $table->string('filiere')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
