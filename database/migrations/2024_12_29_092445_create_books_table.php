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
        Schema::create('book', function (Blueprint $table) {
            $table->string('book_isbn')->primary();
            $table->string('book_title');
            $table->string('book_author');
            $table->string('book_publisher');
            $table->string('book_publication_year');
            $table->string('book_category');
            $table->string('book_code');
            $table->string('book_shelf_location');
            $table->string('book_stock');
            $table->string('book_stock_borrowing');
            $table->integer('book_status');
            $table->string('book_cover');
            $table->string('book_updated_at');
            $table->string('book_created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
