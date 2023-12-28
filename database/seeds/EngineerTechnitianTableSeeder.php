<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EngineerTechnitianTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $handle = fopen("database/seeds/engineer.csv", "r");
        for ($i = 0; $row = fgetcsv($handle); $i++) {
            //name,staff_id,designation,email,mobile
            if($i != 0){
                $name = $row[0];
                $staff_id = $row[1];
                $designation = $row[2];
                $email = $row[3];
                $mobile = $row[4];

                $user = new User;
                $user->name = $name;
                $user->username = $staff_id;
                $user->email = $email;
                $user->designation = $designation;
                $user->mobile=$mobile;
                $user->role_id = 2;
                $user->company_id = 1;
                $user->password = Hash::make('motor@'.$staff_id);
                $user->save();
            }

          
        }
        fclose($handle);


        // technician 
        $handle = fopen("database/seeds/technitian.csv", "r");
        for ($i = 0; $row = fgetcsv($handle); $i++) {
            //name,staff_id,designation,email,mobile
            if($i != 0){
                $name = $row[0];
                $staff_id = $row[1];
                $designation = $row[2];
                $email = $row[3];
                $mobile = $row[4];

                $user = new User;
                $user->name = $name;
                $user->username = $staff_id;
                $user->email = $staff_id.'@aci-bd.com';
                $user->designation = $designation;
                $user->mobile=$mobile;
                $user->role_id = 3;
                $user->company_id = 1;
                $user->password = Hash::make($staff_id);
                $user->save();
            }

          
        }
        fclose($handle);
    }
}
