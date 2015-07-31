<?php
 
use Illuminate\Database\Seeder;

 
class ContactsTableSeeder extends Seeder {
 
    public function run()
    {
        $faker = Faker\Factory::create('pl_PL');
        // Uncomment the below to wipe the table clean before populating
        DB::table('contacts')->delete();
        
        $counties = array(
            'dolnośląskie', 
            'kujawsko-pomorskie', 
            'lubelskie', 
            'lubuskie', 
            'łódzkie', 
            'małopolskie', 
            'mazowieckie', 
            'opolskie', 
            'podkarpackie', 
            'podlaskie', 
            'pomorskie', 
            'śląskie', 
            'świętokrzyskie', 
            'warmińsko-mazurskie', 
            'wielkopolskie', 
            'zachodniopomorskie'
        );
        //create contact with maximum length fields - useful for spotting layout rendering visual bugs
        $contacts = array(
            ['id' => 1,
            'first_name' => 'Wierzchosława',
            'last_name' => 'Achmistrowicz-Wachmistrowicz',
            'phone' => '+(23) 324-242-424',
            'email' => ' 	fP0I23B8wZJs23pNFRrVMm3ZR27GONh9q@x7tORY3KI.D48sPv',
            'city' => 'Sobienie Kiełczewskie Pierwsze',
            'street' => 'Rondo Kombatantów Rzeczypospolitej Polskiej i Byłych Więźniów Politycznych',
            'house_number' => '2AV3/324',
            'zip_code' => '26-344',
            'county' => 'lubelskie',
            'user_id' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime ]
        );
        
        for ($i = 2; $i <= 1000; $i++) {
            array_push($contacts, ['id' => $i, 'first_name' => $faker->firstName, 'last_name' => $faker->lastName, 'phone' => $faker->phoneNumber, 'email' => $faker->email, 'city' => $faker->city, 'street' => $faker->streetName, 'house_number' => $faker->buildingNumber, 'zip_code' => $faker->postcode, 'county' => $counties[array_rand($counties)], 'user_id' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime ]);
        }
        // Uncomment the below to run the seeder
        DB::table('contacts')->insert($contacts);
    }
 
}