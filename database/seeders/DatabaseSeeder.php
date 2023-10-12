<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // $this->call(DistrictSeeder::class);
        //$this->call(RegionAbidjanSeeder::class);
        //$this->call(RegionSeeder::class);
       // $this->call(SexeSeeder::class);
       // $this->call(NationaliteSeeder::class);
       // $this->call(SituationMatrimonialeSeeder::class);
       // $this->call(SituationProfessionelsSeeder::class);
        $this->call(TypePiecesSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
