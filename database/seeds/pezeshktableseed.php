<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class pezeshktableseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctor')->insert([
            'fname'=> str_random(10),
            'lname'=>str_random(10),
            'username'=>str_random(10),
            'password'=>bcrypt('secret'),
            'code'=>'2589',
            'expert'=>'گوارش',
            'day'=>'شنبه',
            'fhour'=>'16:00:00',
            'thour'=>'20:00:00',
            'date'=>'1395/11/12',

        ]);
    }
}
