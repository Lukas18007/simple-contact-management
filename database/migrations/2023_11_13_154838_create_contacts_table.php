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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->collation('utf8mb4_unicode_ci');
            $table->string('contact', 9)->nullable(false)->unique();
            $table->string('email')->nullable(false)->unique();
            $table->timestamps();
        });

        DB::statement('ALTER TABLE contacts MODIFY name VARCHAR(255) CHECK (LENGTH(name) >= 5)');

        DB::statement('ALTER TABLE contacts ADD CONSTRAINT contacts_email CHECK (email REGEXP "^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$")');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
