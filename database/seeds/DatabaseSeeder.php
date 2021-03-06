<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(InstructorSeeder::class);
        $this->call(CSSubjectSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(BlockSeeder::class);
        $this->call(InstructorSchedSeeder::class);
    }
}
