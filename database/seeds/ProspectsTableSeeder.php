<?php

use App\Prospect;
use Illuminate\Database\Seeder;

class ProspectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Prospect::class, 50)->create();
    }
}
