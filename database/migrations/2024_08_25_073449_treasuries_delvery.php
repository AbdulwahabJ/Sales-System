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
        Schema::create('treasuries_delevry', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('treasuries_id'); //الخزنة التي ستستلم
            $table->unsignedBigInteger('treasuries_can_delevry'); //الخزنة التي سيتم تسليمها
            $table->unsignedBigInteger('added_by');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
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
