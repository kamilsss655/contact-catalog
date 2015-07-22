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

        Model::reguard();
    }
}

class ContactsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
        'first_name'     => 'Chris',
        'last_name'     => 'Dorantoro',
        'email'    => 'bestnunu@eune.pl',
        'password' => Hash::make('bestnunu'),
    ));
    }
}
