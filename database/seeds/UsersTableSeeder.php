<?php
 
use Illuminate\Database\Seeder;
 
class UsersTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();
 
        $users = array(
            ['id' => 1, 'first_name' => 'Jan', 'last_name' => 'Kowalczyk', 'email' => 'user@user.com', 'password'=>bcrypt('password'), 'created_at' => new DateTime, 'updated_at' => new DateTime ],
            ['id' => 2, 'first_name' => 'Tadeusz', 'last_name' => 'Kopyra', 'email' => 'jankopyra@wp.pl', 'password'=>bcrypt('JanKopyra'), 'created_at' => new DateTime, 'updated_at' => new DateTime ]
        );
        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }
 
}