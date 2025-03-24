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
        Schema::create('location', function (Blueprint $table) {
            $table->id();
            $table->string('location', 100);
            $table->text('address');
            $table->string('contact_person', 50);
            $table->string('contact_person_mobile', 10);
            $table->string('lat', 20);
            $table->string('long', 20);
            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('location', function (Blueprint $table) {
            $table->dropIfExists();
        });

    }
};
