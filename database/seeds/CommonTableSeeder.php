<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CommonTableSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        
        
        DB::table('groups')->insert([
            'name' => 'ACI GROUP',
            'code' => 'aci'
        ]);
        DB::table('companies')->insert([
            'name' => 'ACI',
            'code' => 'aci',
            'group_id' => 1
        ]);
       

        // status 
        DB::table('roles')->insert([
            ["name"=>"Admin","code"=>"admin"],
            ["name"=>"Engineer","code"=>"engineer"],
            ["name"=>"Technitian","code"=>"technitian"],
        ]);


        DB::table('users')->insert([
            'username' => '111',
            'name' => 'Super Admin',
            'designation' => 'Super Admin',
           // 'mobile' => '0000',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
            'company_id' => 1,
            'password' => Hash::make('adminaci'),
        ]);

        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'Admin',
            'designation' => 'Admin',
           // 'mobile' => '0000',
            'email' => 'admin2@aci.com',
            'role_id' => 1,
            'company_id' => 1,
            'password' => Hash::make('mis@111'),
        ]);


        DB::table('users')->insert([
            'username' => 'engineer',
            'name' => 'Test Engineer',
            'designation' => 'Engineer',
            'email' => 'engineer1@aci-bd.com.com',
            'role_id' => 2,
            'company_id' => 1,
            'password' => Hash::make('engineeraci'),
        ]);

        DB::table('users')->insert([
            'username' => 'technitian',
            'name' => 'Test Technitian',
            'designation' => 'Technician',
            'email' => 'technitian1@aci-bd.com.com',
            'role_id' => 3,
            'company_id' => 1,
            'password' => Hash::make('technitianaci'),
        ]);

        DB::table('users')->insert([
            'username' => 'technitia2',
            'name' => 'Test Technitian2',
            'designation' => 'Technician',
            'email' => 'technitian12@aci-bd.com',
            'role_id' => 3,
            'company_id' => 1,
            'password' => Hash::make('technitian2'),
        ]);


        // Call Types
        DB::table('call_types')->insert([
            ["name"=>"Customer","name_bn"=>"গ্রাহক",'code'=>'customer'],
            ["name"=>"Own","name_bn"=>"নিজ",'code'=>'own'], 
        ]);
      
        // product
        DB::table('products')->insert([
            ["name"=>"Tractor","name_bn"=>"ট্রাক্টর",'code'=>'tractor'], 
            ["name"=>"Power Tiler","name_bn"=>"পাওয়ার টিলার",'code'=>'power_tiler'], 
            ["name"=>"Rice Transplanter","name_bn"=>"রাইস ট্রান্সপ্লান্টার",'code'=>'rice_transplanter'], 
            ["name"=>"Harvester","name_bn"=>"হারভেস্টার",'code'=>'harvester'], 
            ["name"=>"Riper","name_bn"=>"রিপার",'code'=>'riper'], 
            ["name"=>"Dijel Engine","name_bn"=>"ডিজেল ইঞ্জিন",'code'=>'dijelengine'],
            ["name"=>"Others","name_bn"=>"অন্যান্য",'code'=>'Others'],  
        ]);  
        
        // Service Types
        DB::table('service_types')->insert([
            ["name"=>"Installation","name_bn"=>"ইন্সটলেশন",'code'=>'own'], 
            ["name"=>"Preodical Service","name_bn"=>"প্রিওডিক্যাল সার্ভিস",'code'=>'preodical_servcie'], 
            ["name"=>"Warrenty Service","name_bn"=>"ওয়ারেন্টি সার্ভিস",'code'=>'warrenty_service'],
            ["name"=>"Paid Service","name_bn"=>"পেইড সার্ভিয়ে",'code'=>'paidservice'],
            ["name"=>"Post Warrenty Customer Visit","name_bn"=>"পোস্ট ওয়ারেন্টি গ্রাহক ভিজিট",'code'=>'post_warrenty_visit'], 
        ]);   


        // Call Types
        DB::table('areas')->insert([
            ["name"=>"TestArea","code"=>"testArea"],
            ["name"=>"Dhaka","code"=>"Dhaka"],
            ["name"=>"Rangpur","code"=>"Rangpur"], 
            ["name"=>"Rajshahi","code"=>"Rajshahi"], 
            ["name"=>"Bogura","code"=>"Bogura"], 
            ["name"=>"Dinajpur","code"=>"Dinajpur"], 
            ["name"=>"Sylhet","code"=>"Sylhet"], 
            ["name"=>"Lalmonirhat","code"=>"Lalmonirhat"], 
            ["name"=>"Naogaon","code"=>"Naogaon"], 
            ["name"=>"Chuadanga","code"=>"Chuadanga"], 
            ["name"=>"Faridpur","code"=>"Faridpur"], 
            ["name"=>"Barishal","code"=>"Barishal"], 
            ["name"=>"Mymensingh","code"=>"Mymensingh"], 
            ["name"=>"Jamalpur","code"=>"Jamalpur"], 
            ["name"=>"Kishoregonj","code"=>"Kishoregonj"], 
            ["name"=>"Comilla","code"=>"Comilla"], 
            ["name"=>"Noakhali","code"=>"Noakhali"], 
            ["name"=>"Habigonj","code"=>"Habigonj"], 
            ["name"=>"Jashore","code"=>"Jashore"], 
            ["name"=>"Thakurgaon","code"=>"Thakurgaon"], 
            ["name"=>"Chattogram","code"=>"Chattogram"], 
            ["name"=>"Mirpur","code"=>"Mirpur"],  
        ]);

        DB::table('territories')->insert([
            ["name"=>"Territory1","code"=>"test",'area_id'=>1],
            ["name"=>"Territory2","code"=>"test2",'area_id'=>2], 
        ]);


         DB::table('user_areas')->insert([
            ["user_id"=>3,"area_id"=>1],
        ]);
        
        DB::table('user_territories')->insert([
            ["user_id"=>4,"territory_id"=>1],
            ["user_id"=>5,"territory_id"=>1],
        ]);

        
    }
}
