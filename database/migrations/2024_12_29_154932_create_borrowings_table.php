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
        Schema::create('borrowing', function (Blueprint $table) {
            $table->string('borrowing_id')->primary();
            $table->string('member_id');
            $table->string('book_isbn');
            $table->string('member_name');
            $table->string('book_title');
            $table->string('book_code');
            $table->string('book_shelf_location');
            $table->string('book_cover');
            $table->integer('borrowing_qty');
            $table->string('borrowing_start_date');
            $table->string('borrowing_end_date');
            $table->string('borrowing_overdue');
            $table->integer('borrowing_status');
            $table->string('borrowing_updated_at');
            $table->string('borrowing_created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowing');
    }
};
