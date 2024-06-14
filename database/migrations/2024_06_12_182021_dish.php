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

        Schema::create('dish', function (Blueprint $table) {
            $table->id();
            $table->integer('dishnumber')->nullable();
            $table->char('addition')->nullable();
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->string('dishtype');
            $table->timestamps();

            $table->foreign('dishtype')->references('type')->on('dishtype')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
