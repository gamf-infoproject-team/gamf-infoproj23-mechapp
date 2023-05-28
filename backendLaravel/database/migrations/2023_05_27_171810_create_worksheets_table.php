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
        Schema::create('worksheets', function (Blueprint $table) {
            $table->id();
            $table->integer('mechanicId');
            $table->timestamp('startDate');
            $table->timestamp('endDate')->nullable();
            $table->integer('garageId');
            $table->integer('quotationId');
            $table->string('comment');
            $table->string('additionalWork');
            $table->string('additionalParts');
            $table->boolean('invoiced');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('worksheets');
    }
};