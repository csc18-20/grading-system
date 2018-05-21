<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpreadSheetsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('spread_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('semester')->nullable();
            $table->string('lecturer')->nullable();
            $table->string('course_name')->nullable();
            $table->string('course_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('spread_sheets');
    }
}
