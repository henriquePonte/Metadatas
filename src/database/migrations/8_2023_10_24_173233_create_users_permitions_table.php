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
        Schema::create('user_type_permitions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('type');
        });

        Schema::create('user_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_type_permition_id')->constrained();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');;
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_type_permitions');
        Schema::dropIfExists('user_type');
    }
};
