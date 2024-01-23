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
        Schema::create('document_permitions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softdeletes();
            $table->string("types");
        });

        Schema::create('document_permition_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->foreignId("document_permition_id")->nullable()->constrained();
            $table->foreignId("document_id")->nullable()->constrained();
            $table->foreignId("user_id")->nullable()->constrained();
            $table->foreignId("department_id")->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_permitions');
        Schema::dropIfExists('document_permition_type');

    }
};
