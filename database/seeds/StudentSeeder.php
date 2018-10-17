<?php
use App\Role;
use App\Student;
use App\StudentParent;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$role_student = Role::where('name','Student')->first();
      $parent = new StudentParent;
      $parent->mothername = 'Josephine Villamon';
      $parent->fathername = 'Virgintino Villamon';
      $parent->mobile_number = '09193693499';
      $parent->save();

   		$student = new Student();
   		$student->id_number = 1500507;
   		$student->fullname = 'Jover John Villamon';
   		$student->year = 1;
   		$student->course_id = 2;
      $student->student_parent_id = $parent->id;
   		$student->save();

   		$s = new User();
      $s->name = 'Jover John Villamon';
      $s->id_number = 1500507;
      $s->password = bcrypt(1234);
      $s->save();
 		  $s->roles()->attach($role_student);

      $faker = Faker::create();
         foreach (range(1,45) as $index) {
              DB::table('students')->insert([
                  'id_number' => '15017' . $index,
                  'fullname' => $faker->name,
                  'year' => 1,
                  'course_id' => 2,
                  'student_parent_id' => $parent->id,
              ]);
       }

       foreach (range(1,45) as $index) {
              DB::table('student_parents')->insert([
                  'mothername' => $faker->name,
                  'fathername' => $faker->name,
                  'mobile_number' => '09193693499',
             ]);
       }
    }
}
