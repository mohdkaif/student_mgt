<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = array(
            array('id' => '1', 'name' => 'Satish Lanke', 'roll_no' => '12345', 'class' => '8', 'subjects' => '["English","Hindi","Kannada","Math","Physics"]', 'passport_photo' => 'assets/uploads/passport_photo/Warranty.ico', 'status' => 'active', 'created_by' => '1', 'updated_by' => '1', 'deleted_at' => NULL, 'created_at' => '2022-02-08 12:42:45', 'updated_at' => '2022-02-08 12:42:45'),
            array('id' => '2', 'name' => 'Mohd Kaif', 'roll_no' => '3456787', 'class' => '5', 'subjects' => '["English","Kannada","Math"]', 'passport_photo' => 'assets/uploads/passport_photo/Support.ico', 'status' => 'active', 'created_by' => '1', 'updated_by' => '1', 'deleted_at' => NULL, 'created_at' => '2022-02-08 14:09:43', 'updated_at' => '2022-02-08 14:09:43'),
            array('id' => '3', 'name' => 'John Anderson', 'roll_no' => '98765', 'class' => '10', 'subjects' => '["English","Kannada","Physics","Hindi"]', 'passport_photo' => 'assets/uploads/passport_photo/Support.ico', 'status' => 'active', 'created_by' => '1', 'updated_by' => '1', 'deleted_at' => NULL, 'created_at' => '2022-02-08 14:09:43', 'updated_at' => '2022-02-08 14:09:43')
        );
        foreach ($students as $count) {
            \DB::table('students')->insert($count);
        }
    }
}
