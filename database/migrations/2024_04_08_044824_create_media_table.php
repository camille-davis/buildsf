<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('filename');
            $table->string('alt')->nullable();
            $table->foreignId('project_id')->nullable()->constrained();
            $table->integer('weight')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
