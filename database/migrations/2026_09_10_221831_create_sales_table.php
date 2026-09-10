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
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id'); //主キー

            $table->unsignedBigInteger('user_id'); //ユーザーID（FK: users.id)
            $table->unsignedBigInteger('product_id'); //商品ID (FK: product.id)

            $table->bigInteger('quantity'); //個数

            $table->timestamp('created_at')->nullable(); //作成日
            $table->timestamp('updated_at')->nullable(); //更新日

            //外部キー設定
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
