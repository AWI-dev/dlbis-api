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
        Schema::create('credentials', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique()->index();
            $table->string('password');
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        Schema::create('credential_employee_informations', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->integer('role')->default(1); // 1 = guest, 2 = admin
            $table->string('prefix')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('company_email');
            SchemaHelper::addCommonColumns($table);

            $table->foreign('employee_id')->references('employee_id')->on('credentials');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credentials');
        Schema::dropIfExists('credential_employee_information');

    }
};
