<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MarkSheetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student_marksheets = array(
            array('id' => '1', 'student_id' => '1', 'subject_marks' => '[{"subject_name":"English","subject_marks":"10"},{"subject_name":"Hindi","subject_marks":"20"},{"subject_name":"Kannada","subject_marks":"20"},{"subject_name":"Math","subject_marks":"30"},{"subject_name":"Physics","subject_marks":"35"}]', 'total_marks' => '115', 'status' => 'active', 'created_by' => '1', 'updated_by' => '1', 'deleted_at' => NULL, 'created_at' => '2022-02-08 12:43:12', 'updated_at' => '2022-02-08 12:43:12'),
            array('id' => '4', 'student_id' => '2', 'subject_marks' => '[{"subject_name":"English","subject_marks":"10"},{"subject_name":"Kannada","subject_marks":"20"},{"subject_name":"Math","subject_marks":"30"}]', 'total_marks' => '60', 'status' => 'active', 'created_by' => '1', 'updated_by' => '1', 'deleted_at' => NULL, 'created_at' => '2022-02-08 14:12:05', 'updated_at' => '2022-02-08 14:12:05')
        );
        foreach ($student_marksheets as $count) {
            \DB::table('student_marksheets')->insert($count);
        }
    }
}
