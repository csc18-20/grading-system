<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('spreadsheet_id')->unsigned()->index();
            $table->integer("user_id")->unsigned()->index();
            $table->double('final_mark')->unsigned();
            $table->text('assignments');
            $table->text('exam');
            $table->double('final_exam')->unsigned();
            $table->double('final_course_work')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
