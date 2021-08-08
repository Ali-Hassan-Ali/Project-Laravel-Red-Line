<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['product one', 'product two', 'product four','product five','product six','product Seven' ,'product eight' ,'product nine'];

        foreach ($categories as $category) {

            \App\Models\Product::create([
                'name'        => ['ar'=> $category, 'en' => $category],
                'description' => ['ar'=> $category, 'en' => $category],
                'price'       => 80,
                'quantity'    => 80,
                'category_id' => 1,
            ]);

        }//end of foreach

        $categories = ['product one', 'product two', 'product four','product five','product six','product Seven' ,'product eight' ,'product nine'];

        foreach ($categories as $category) {

            \App\Models\Product::create([
                'name'        => ['ar'=> $category, 'en' => $category],
                'description' => ['ar'=> $category, 'en' => $category],
                'price'       => 120,
                'quantity'    => 80,
                'category_id' => 2,
            ]);

        }//end of foreach

        $categories = ['product one', 'product two', 'product four','product five','product six','product Seven' ,'product eight' ,'product nine'];

        foreach ($categories as $category) {

            \App\Models\Product::create([
                'name'        => ['ar'=> $category, 'en' => $category],
                'description' => ['ar'=> $category, 'en' => $category],
                'price'       => 150,
                'quantity'    => 80,
                'category_id' => 3,
            ]);

        }//end of foreach

    }//end of run

}//end o f class
