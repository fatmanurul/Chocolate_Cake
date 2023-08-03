<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('cmn_id');
            $table->unsignedBigInteger('cmn_articles_id');
            $table->string('cmn_name');
            $table->string('cmn_email');
            $table->text('cmn_comment');
            $table->foreign('cmn_articles_id')->references('art_id')->on('articles')->onDelete('cascade');
            $table->unsignedBigInteger('cmn_created_by')->nullable();
            $table->unsignedBigInteger('cmn_updated_by')->nullable();
            $table->unsignedBigInteger('cmn_deleted_by')->nullable();
            $table->timestamp('cmn_created_at')->nullable();
            $table->timestamp('cmn_updated_at')->nullable();
            $table->timestamp('cmn_deleted_at')->nullable();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('cmn_created_by')->references('cmn_id')->on('comments')->onDelete('cascade');
            $table->foreign('cmn_updated_by')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('cmn_deleted_by')->references('usr_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
