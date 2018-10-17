<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_parent = Role::where('name','Parent')->first();
        $role_admin = Role::where('name','Admin')->first();
        $role_student = Role::where('name','Student')->first();
        $role_instructor = Role::where('name','Instructor')->first();
        $role_assistant_dean = Role::where('name','Assistant Dean')->first();

        $parent = new User();
        $parent->name = 'Parent account';
        // $parent->email ='parent@gmail.com';
        $parent->id_number = '1511111';
        $parent->password = bcrypt(1234);
        $parent->save();
        $parent->roles()->attach($role_parent);

        $admin = new User();
        $admin->name = 'Joshua Admin';
        // $admin->email ='admin@gmail.com';
        $admin->id_number = '1522222';
        $admin->password = bcrypt(1234);
        $admin->save();
        $admin->roles()->attach($role_admin);


        $student = new User();
        $student->name = 'Student student';
        $student->id_number = '1533333';
        $student->password = bcrypt(1234);
        $student->save();
        $student->roles()->attach($role_student);

        $instructor = new User();
        $instructor->name = 'Instructor Instructor';
        $instructor->id_number = '1544444';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('ERLINDA M. RAVELO');
        $instructor->id_number = '01';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('ENGR. ERNESTO R. CUARTERO,');
        $instructor->id_number = '02';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('NAP NICHOLE GREG S. SALERA');
        $instructor->id_number = '03';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('ENGR. JESSIE A. DEMONTANO');
        $instructor->id_number = '04';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('CATHERINE R. ALIMBOYONG');
        $instructor->id_number = '05';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('CHERLY B. SARDOVIA');
        $instructor->id_number = '06';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('ENGR. ALEX S. LADAGA');
        $instructor->id_number = '07';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('ENGR. RETCHE G. TUBAY');
        $instructor->id_number = '08';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('ENGR. REMEGIO P. DAPANAS');
        $instructor->id_number = '09';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('JOSEPHINE L. BULILAN');
        $instructor->id_number = '10';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('MARY ANN F. GUIRAL-ESTAL');
        $instructor->id_number = '11';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('MICHAEL L. ESTAL');
        $instructor->id_number = '12';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('SHIELLA ANN B. PACHECO');
        $instructor->id_number = '13';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('MELBRICK A. EVALLAR');
        $instructor->id_number = '14';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('BORN CHRISTIAN A. ISIP');
        $instructor->id_number = '15';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        $instructor = new User();
        $instructor->name = strtolower('ENGR. DIVINE GRACE N. LOREN');
        $instructor->id_number = '16';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_instructor);

        /*ASSISTANT DEAN*/
        $instructor = new User();
        $instructor->name = 'Engr. Jessie A. Demontano';
        $instructor->id_number = '1500001';
        $instructor->password = bcrypt(1234);
        $instructor->save();
        $instructor->roles()->attach($role_assistant_dean);
        /*END OF ASSISTANT DEAN*/

    }
}
