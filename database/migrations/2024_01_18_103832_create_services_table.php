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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('kategori_services')->onDelete('cascade');

            $table->text('image');
            $table->text('icon');
            $table->text('title');
            $table->text('slug');
            $table->text('view_count');
            $table->text('overview');
            $table->text('desc');
            $table->text('keyword');
            $table->text('tags');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
