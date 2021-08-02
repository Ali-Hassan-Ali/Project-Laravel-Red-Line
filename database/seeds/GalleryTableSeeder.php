<?php

use Illuminate\Database\Seeder;

class GalleryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gallerys = ['gallery one', 'gallery two', 'gallery three','gallery for','gallery five','gallery six'];

        foreach ($gallerys as $gallery) {

            \App\Models\Gallery::create([
                'title' => $gallery,
            ]);

        }//end of foreach
    }
}
