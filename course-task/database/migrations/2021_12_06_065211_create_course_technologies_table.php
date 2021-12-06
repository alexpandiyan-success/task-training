<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_technologies', function (Blueprint $table) {
            $table->id();
            $table->string('course_id')->references('id')->on('courses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('technology_id')->references('id')->on('technologies')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_technologies');
    }
}
