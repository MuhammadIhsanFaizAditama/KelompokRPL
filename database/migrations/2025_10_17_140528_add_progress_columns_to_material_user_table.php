<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::table('material_user', function (Blueprint $table) {
        $table->boolean('is_read')->default(false);
        $table->boolean('is_completed')->default(false);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('material_user', function (Blueprint $table) {
            //
        });
    }
};
