<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); //主キー

            $table->string('name', 255); //ユーザ名
            $table->string('name_kanji', 255); //漢字名
            $table->string('name_kana', 255)->nullable(); //カナ名
            $table->string('email', 255); //メールアドレス
            $table->string('password', 255); //パスワード

            $table->unsignedbigInteger('company_id')->nullable(); //会社ID（外部キー）

            $table->foreign('company_id')
                  ->references('id')
                  ->on('companies')
                  ->onDelete('set null');

            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
