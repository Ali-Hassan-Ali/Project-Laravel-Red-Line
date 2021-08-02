<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payments = ['default.png', 'default.png', 'default.png','default.png','default.png','default.png'];

        foreach ($payments as $payment) {

            \App\Models\Payment::create([
                'image' => $payment,
            ]);

        }//end of foreach

    }//end of run

}//end of class
