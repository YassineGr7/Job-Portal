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
    Schema::table('categories', function (Blueprint $table) {
      $table->string('icon')->nullable(); // Adding the new column with nullable attribute
    });
  }

  public function down()
  {
    Schema::table('categories', function (Blueprint $table) {
      $table->dropColumn('icon'); // Drop the column if rolling back
    });
  }
};
