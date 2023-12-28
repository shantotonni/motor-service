<?php

use App\Area;
use App\Territory;
use Illuminate\Database\Seeder;
//use DB;

class TerritorySeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //

        $handle = fopen("database/seeds/territory_csv.csv", "r");
        for ($i = 0; $row = fgetcsv($handle); $i++) {
            $area_name = $row[0];
            $territory_name = $row[1];
            $area = Area::where('name',$area_name)->first();
            if($area){
                $territory = new Territory;
                $territory->area_id = $area->id;
                $territory->name = $territory_name;
                $territory->code = $territory_name;
                $territory->save();
            }
        }
        fclose($handle);

        // DB::table('territories')->insert([
        //     ["name"=>"Territory1","code"=>"test",'area_id'=>1],
        //     ["name"=>"Territory2","code"=>"test2",'area_id'=>2], 
        // ]);
    }
}
