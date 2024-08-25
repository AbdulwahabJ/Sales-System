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
        Schema::create('treasuries', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->boolean('is_master')->default(true);;
            $table->string('last_isal_exhcange');
            $table->string('last_isal_collect');
            $table->unsignedBigInteger('added_by');
            $table->unsignedBigInteger('updated_by')->nullable(); // لإضافة المستخدم الذي قام بتحديث السجل
            $table->smallInteger('com_code');
            $table->date('date')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->foreign('added_by')->references('id')->on('admins');
            $table->foreign('updated_by')->references('id')->on('admins');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treasuries');
    }
};
