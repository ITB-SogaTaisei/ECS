<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->integer('price')->unsigned();
            $table->integer('stock')->unsigned()->default(0);
            $table->string('image')->nullable(); 
            $table->unsignedInteger('quantity')->default(1);
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            // 'products' テーブルが存在しない場合は適切なテーブル名に変更してください。
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
}