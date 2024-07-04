<?php

use App\Helpers\SchemaHelper;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory_titles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('inventory_title_date');
            SchemaHelper::addCommonColumns($table);

        });

        Schema::create('inventory_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_title_id');
            $table->text('war_pr');
            $table->text('telephone_number');
            $table->text('telecom_equipment');
            $table->text('recovery_sn');
            SchemaHelper::addCommonColumns($table);

            $table->foreign('inventory_title_id')->references('id')->on('inventory_titles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_titles');
        Schema::dropIfExists('inventory_details');
    }
};
