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
        Schema::create('issue', function (Blueprint $table) {
            $table->id();
            $table->string('select_asset', 200);
            $table->string('description', 100);
            $table->string('type', 50);
            // $table->string('image');
            $table->string('department', 50);
            $table->string('status');
            $table->string('date');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('issue', function (Blueprint $table) {
            $table->dropIfExists();
        });

    }
};
