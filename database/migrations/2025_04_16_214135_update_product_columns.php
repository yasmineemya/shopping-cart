<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('description')->change();      // was varchar(255), now text
            $table->text('image_url')->change();        // was varchar(255), now text
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('description', 255)->change();
            $table->string('image_url', 255)->change();
        });
    }
};

