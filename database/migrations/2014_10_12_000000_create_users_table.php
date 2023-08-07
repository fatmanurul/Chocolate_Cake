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
            $table->bigIncrements('usr_id');
            $table->string('usr_name');
            $table->string('usr_email')->unique();
            $table->string('usr_password');
            $table->string('usr_remember_Token')->nullable();
            $table->unsignedBigInteger('usr_created_by')->nullable();
            $table->unsignedBigInteger('usr_updated_by')->nullable();
            $table->unsignedBigInteger('usr_deleted_by')->nullable();
            $table->timestamp('usr_created_at');
            $table->timestamp('usr_updated_at')->nullable();
            $table->timestamp('usr_deleted_at')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('usr_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('usr_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('usr_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
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
