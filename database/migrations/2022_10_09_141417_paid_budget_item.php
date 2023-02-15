<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('paid_budget_item', function (Blueprint $table) {
            $table->string('resource_id');
            $table->string('budget_item_id');
            $table->unsignedInteger('year');
            $table->unsignedTinyInteger('month');
            $table->timestamps();

            $table->primary(['resource_id', 'budget_item_id', 'year', 'month'], 'paid_budget_item_primary');
            $table->index('resource_id');
            $table->index('budget_item_id');
            $table->index('year');
            $table->index('month');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // No down
    }
};
