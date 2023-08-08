<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('art_id');
            $table->unsignedBigInteger('art_category_id');
            $table->string('art_title', 100);
            $table->string('art_slug')->unique();
            $table->string('art_image');
            $table->string('art_excerpt', 100);
            $table->text('art_content');
            $table->boolean('art_status')->default(1); //1 untuk tampil
            $table->foreign('art_category_id')->references('ctg_id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('art_created_by');
            $table->unsignedBigInteger('art_updated_by')->nullable();
            $table->unsignedBigInteger('art_deleted_by')->nullable();
            $table->timestamp('art_created_at');
            $table->timestamp('art_updated_at')->nullable();
            $table->timestamp('art_deleted_at')->nullable();
        });

        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('art_created_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('art_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('art_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
