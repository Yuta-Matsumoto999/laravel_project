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
            $table->increments('id');
            $table->string('name')->comment('表示名');
            $table->string('email')->nullable()->comment('email');
            $table->string('password')->nullable()->comment('ログインパスワード');
            $table->integer('address_num')->nullable()->comment('郵便番号');
            $table->string('address')->nullable()->comment('住所');
        
            $table->string('avatar')->nullable()->comment('アイコンのURL');
            $table->string('twitter_id')->unique()->nullable()->comment('twitterの内部ID');
            $table->string('twitter_name')->nullable()->comment('twitterの@名前、変更出来ない方');
        
            $table->timestamp('email_verified_at')->nullable();
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
