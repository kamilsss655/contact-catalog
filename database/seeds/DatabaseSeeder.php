<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call('UsersTableSeeder');
        $this->call('ContactsTableSeeder');	
        
        //no longer needed due to database schema change	
        //$this->call('CountiesTableSeeder');	

        Model::reguard();
    }
}