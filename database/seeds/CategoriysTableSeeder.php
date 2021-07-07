<?php

use Illuminate\Database\Seeder;

class CategoriysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['cat one', 'cat two', 'cat three','cat for'];

        foreach ($categories as $category) {

            \App\Models\Categorey::create([
                'name' => ['ar'=> $category, 'en' => $category],
            ]);

        }//end of foreach
    }
}
