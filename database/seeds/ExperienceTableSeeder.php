<?php

use Illuminate\Database\Seeder;
use App\Models\Experience as Exp;

class ExperienceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Exp,10)->create();
    }
}
