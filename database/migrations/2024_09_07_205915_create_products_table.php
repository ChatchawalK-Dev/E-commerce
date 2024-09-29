<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable();
            $table->string('size')->nullable();     // ฟิลด์ size
            $table->string('color')->nullable();    // ฟิลด์ color
            $table->string('sku')->unique();        // ฟิลด์ SKU (ควรเป็น unique)
            $table->string('category')->nullable(); // ฟิลด์ category
            $table->string('tags')->nullable();     // ฟิลด์ tags (อาจจะเก็บเป็น JSON หรือ String)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
