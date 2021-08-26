<?php

use Illuminate\Database\Seeder;

class CurrencsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Currenc::create([
            'sdg' => '47.50.00',
            'egp' => '17.20',
        ]);
    }//end of run

}//end of class
