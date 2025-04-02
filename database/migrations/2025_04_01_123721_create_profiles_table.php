<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('cover_image')->nullable();
            $table->string('profile_image')->nullable();
            $table->text('description')->nullable();
            $table->text('about')->nullable();
            $table->json('services')->nullable();
            $table->json('experience')->nullable();
            $table->json('education')->nullable();
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
