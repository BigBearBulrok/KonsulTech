<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the reviewer
            $table->string('image'); // Path to the review image
            $table->text('text');   // Review text
            $table->integer('rating'); // Review rating (1-5 stars)
            $table->timestamps(); // Created at and updated at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
}