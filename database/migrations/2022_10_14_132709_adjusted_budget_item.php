<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('adjusted_budget_item', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('resource_id');
            $table->string('budget_item_id');
            $table->unsignedInteger('year');
            $table->unsignedTinyInteger('month');
            $table->decimal('amount',12, 2);
            $table->timestamps();

            $table->index('resource_id');
            $table->index('budget_item_id');
            $table->index('year');
            $table->index('month');
        });
    }

    public function down()
    {
        // No down
    }
};
