<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username'); //←追加
            $table->string('email')->unique();
            //$table->timestamp('email_verified_at')->nullable();←メール認証は不要なので削除します。
            $table->string('password'); //←ここには空文字が登録されます。不要な気もするが参考資料は削除してないので真似します・・・。
            $table->rememberToken();//←passwordと同じく参考資料の真似。
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
;
