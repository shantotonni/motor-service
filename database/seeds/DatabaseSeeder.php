<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        $this->call(UsersTableSeeder::class);
        $this->call(CommonTableSeeder::class);
        $this->call(FeaturePermissionSeeder::class);
        $this->call(TerritorySeeder::class);
        $this->call(EngineerTechnitianTableSeeder::class);
    }
}
