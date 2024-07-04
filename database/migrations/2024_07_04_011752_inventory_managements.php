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
            $table->text('reference_code');
            $table->text('item_name');
            $table->text('item_code');
            $table->text('other_text');
            $table->text('remarks');

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
