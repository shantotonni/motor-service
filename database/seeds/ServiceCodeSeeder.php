<?php

use App\User;
use App\UserKpiCode;
use Illuminate\Database\Seeder;
//use DB;


class ServiceCodeSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $handle = fopen("database/seeds/service_income_codes.csv", "r");
        for ($i = 0; $row = fgetcsv($handle); $i++) {
            $staff_id = $row[1];
            $name = $row[2];
            $area=$row[3];
            $service_income=$row[4];
            $tractor_spare_parts=$row[5];
            $tractor_sonalika_lub=$row[6];
            $tractor_pt=$row[7];
            $nm_spare_parts=$row[8];
            $nm_power_oil_lub=$row[9];
            $pt_spare_parts=$row[10];
            $pt_oil_lub=$row[11];
            
            $user = User::where('username',$staff_id)->first();
            if($user){
            
            $user_kpi_code=UserKpiCode::where('user_id',$user->id)->first();
            if(!$user_kpi_code) $user_kpi_code = new UserKpiCode;

                $user_kpi_code->user_id=$user->id;
                $user_kpi_code->service_income_code=$service_income;
                $user_kpi_code->tractor_spare_parts_code=$tractor_spare_parts;
                $user_kpi_code->tractor_sonalika_lub_code=$tractor_sonalika_lub;
                $user_kpi_code->tractor_power_oil_code=$tractor_pt;
                $user_kpi_code->nm_spare_parts_code=$nm_spare_parts;
                $user_kpi_code->nm_power_oil_code=$nm_power_oil_lub;
                $user_kpi_code->pt_spare_parts_code=$pt_spare_parts;
                $user_kpi_code->pt_power_oil_code=$pt_oil_lub;
                $user_kpi_code->save();
                print("done....");

            }else{
                print("no user ".$staff_id);
            }



            //$area = Area::where('name',$area_name)->first();
            
        }
        fclose($handle);
    }
}
