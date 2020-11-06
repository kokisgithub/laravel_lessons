<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //up()はこのマイグレーションで行いたい処理
    public function up()
    {
        /*
        自動でモデル'post'を複数形にしたテーブル名になる
        デフォルトでidとtimestamps(created_atとupdated_at)を設定してくれる
        string()はSQLでいうvarchar
        */
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
	        $table->string('title');
            $table->text('body');
	        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     //down()はup()を巻き戻すための処理
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
