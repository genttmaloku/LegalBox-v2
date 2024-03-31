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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->integer('caseid');
            $table->string('name');
            $table->string('surname');
            $table->string('job');
            $table->string('description');
            $table->unsignedBigInteger('lawyer_id');
            $table->foreign('lawyer_id')->references('id')->on('lawyers');
            $table->timestamps();
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
