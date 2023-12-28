<?php

use Illuminate\Database\Seeder;
use App\User;

class KpiTypeUpdate extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $users = User::all();
        foreach($users as $user){
           if($user->role_id == 2){
              $user->kpi_type_id = 1;
           }
           if($user->role_id == 3){
              $user->kpi_type_id = 3;
           }
           $user->save();
        }
    }
}
