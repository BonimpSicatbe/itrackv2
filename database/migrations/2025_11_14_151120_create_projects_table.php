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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_number');
            $table->string('project_name');
            $table->string('city_municipality');
            $table->string('partner');
            $table->integer('number_of_days');
            $table->date('starting_date');
            $table->date('ending_date');
            $table->integer('number_of_beneficiaries');
            $table->decimal('daily_wage', 10, 2);
            $table->decimal('total_cost', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
