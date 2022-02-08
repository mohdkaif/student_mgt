<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStudentMarkSheet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_marksheets', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->default(0);
            $table->json('subject_marks')->nullable();
            $table->bigInteger('total_marks')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('created_by')->default(0);
            $table->integer('updated_by')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('student_marksheets');
    }
}
