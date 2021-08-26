<?php

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
        $this->call(LaratrustSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriysTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(GalleryTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(CurrencsTableSeeder::class);
    }
}
