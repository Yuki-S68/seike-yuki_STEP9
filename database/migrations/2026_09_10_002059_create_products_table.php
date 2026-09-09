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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id'); //主キー

            $table->unsignedBigInteger('user_id'); // ユーザーID（FK: users.id)
            $table->unsignedBigInteger('company_id'); // 会社ID(FK: companies.id)

            $table->string('name', 255); //商品名
            $table->Integer('price'); //価格
            $table->Integer('stock'); //在庫数
            $table->string('description', 255); //説明
            $table->string('img_path', 255); //画像

            $table->timestamp('created_at')->nullable(); //作成日
            $table->timestamp('updated_at')->nullable(); //更新日

            //外部キー設定
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
