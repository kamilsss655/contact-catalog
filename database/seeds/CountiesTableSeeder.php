<?php
 
use Illuminate\Database\Seeder;
 
class CountiesTableSeeder extends Seeder {
 
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('counties')->delete();
 
        $counties = array(
            ['id' => 1, 'county' => 'dolnośląskie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 2, 'county' => 'kujawsko-pomorskie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 3, 'county' => 'lubelskie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 4, 'county' => 'lubuskie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 5, 'county' => 'łódzkie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 6, 'county' => 'małopolskie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 7, 'county' => 'mazowieckie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 8, 'county' => 'opolskie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 9, 'county' => 'podkarpackie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 10, 'county' => 'podlaskie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 11, 'county' => 'pomorskie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 12, 'county' => 'śląskie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 13, 'county' => 'świętokrzyskie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 14, 'county' => 'warmińsko-mazurskie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 15, 'county' => 'wielkopolskie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['id' => 16, 'county' => 'zachodniopomorskie', 'created_at' => new DateTime, 'updated_at' => new DateTime],
        );

        // Uncomment the below to run the seeder
        DB::table('counties')->insert($counties);
    }
 
}