<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            if (!Schema::hasColumn('reviews', 'name')) {
                $table->string('name')->after('id');
            }
            if (!Schema::hasColumn('reviews', 'image')) {
                $table->string('image')->nullable()->after('name');
            }
            if (!Schema::hasColumn('reviews', 'text')) {
                $table->text('text')->nullable()->after('image');
            }
            if (!Schema::hasColumn('reviews', 'rating')) {
                $table->tinyInteger('rating')->unsigned()->after('text');
            }
        });
    }

};
