<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('ctg_id');
            $table->string('ctg_name')->unique();
            $table->unsignedBigInteger('ctg_created_by')->nullable();
            $table->unsignedBigInteger('ctg_updated_by')->nullable();
            $table->unsignedBigInteger('ctg_deleted_by')->nullable();
            $table->foreign('ctg_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ctg_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('ctg_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->timestamp('ctg_created_at');
            $table->timestamp('ctg_updated_at')->nullable();
            $table->timestamp('ctg_deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
