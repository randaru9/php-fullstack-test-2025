<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('my_client', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name', 250);
            $table->string('slug', 100);
            $table->enum('is_project', ['0', '1'])->default('0');
            $table->char('self_capture', 1)->default('1');
            $table->char('client_prefix', 4);
            $table->string('client_logo', 255)->default('no-image.jpg');
            $table->text('address')->nullable();
            $table->string('phone_number', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
