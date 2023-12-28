<?php

use Illuminate\Database\Seeder;

class FeaturePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
       
        DB::table('features')->insert([
        [
            'name' => 'admin list view',
            'code' => 'admin_list_view',
        ],
        [
            'name' => 'reset admin passowrd',
            'code' => 'reset_admin_passowrd',
        ],
        [
            'name' => 'admin info edit',
            'code' => 'admin_info_edit',
        ],
        [
            'name' => 'register admin',
            'code' => 'register_admin',
        ],
        [
            'name' => 'feature_create',
            'code' => 'feature_create',
        ],
        [
            'name' => 'feature_edit',
            'code' => 'feature_edit',
        ],
        
    ]);
        // feature end 
    
    
        // permission 
        
        
        $features = DB::select('SELECT * FROM features'); 
        foreach($features as $feature){
            DB::table('user_features')->insert([
                "user_id"=>1,
                "feature_id"=>$feature->id,
                'admin_id' =>1,
            ]);
        }
        
    

           
    }
}
