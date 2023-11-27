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
        Schema::create('tech_project', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tech_id');
            $table->unsignedBigInteger('project_id');
            $table->foreign('tech_id')->references('id')->on('teches')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tech_project');
    }
};
