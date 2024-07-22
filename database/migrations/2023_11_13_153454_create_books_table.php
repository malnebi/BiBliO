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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('author_fname', 100)->nullable();
            $table->string('author_lname', 100)->nullable();
            $table->string('title', 200);
            $table->string('publisher_name', 100)->nullable();
            $table->string('publisher_place', 100)->nullable();
            $table->string('year', 10)->nullable();
            $table->tinyInteger('loan')->default(0);
            $table->unsignedBigInteger('client_id')->default(0);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
