<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateShopsTableAddColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('shops', function (Blueprint $table) {
        // ตรวจสอบว่าฟิลด์มีอยู่ก่อนที่จะเพิ่ม
        if (!Schema::hasColumn('shops', 'size')) {
            $table->string('size')->nullable()->after('price');
        }
        if (!Schema::hasColumn('shops', 'color')) {
            $table->string('color')->nullable()->after('size');
        }
        if (!Schema::hasColumn('shops', 'sku')) {
            $table->string('sku')->nullable()->after('color');
        }
        if (!Schema::hasColumn('shops', 'category')) {
            $table->string('category')->nullable()->after('sku');
        }
        if (!Schema::hasColumn('shops', 'tags')) {
            $table->string('tags')->nullable()->after('category');
        }
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->dropColumn(['size', 'color', 'sku', 'category', 'tags']);
        });
    }
}

