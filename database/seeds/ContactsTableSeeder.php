<?php
 
use Illuminate\Database\Seeder;
 
class ContactsTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('contacts')->delete();
 
        $contacts = array(
            ['id' => 1, 'first_name' => 'Jan', 'last_name' => 'Kowalczyk', 'phone' => '2332-23-23-23', 'email' => 'email@sd.pl', 'city' => 'Warszawa', 'street' => 'Długa', 'house_number' => '23', 'zip_code' => '26-344', 'filename' => 'hsdk23hsk35osnm4Ij23$j.jpg', 'county_id' => 1, 'user_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime ]
        );
        for ($i = 2; $i <= 80; $i++) {
            array_push($contacts, ['id' => $i, 'first_name' => 'Jan', 'last_name' => 'Kowalczyk', 'phone' => '2332-23-23-23', 'email' => 'email@sd.pl', 'city' => 'Warszawa', 'street' => 'Długa', 'house_number' => '23', 'zip_code' => '26-344', 'filename' => 'hsdk23hsk35osnm4Ij23$j.jpg', 'county_id' => 1, 'user_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime ]);
        }
        // Uncomment the below to run the seeder
        DB::table('contacts')->insert($contacts);
    }
 
}