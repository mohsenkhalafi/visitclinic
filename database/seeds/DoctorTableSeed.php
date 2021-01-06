<?php

use Illuminate\Database\Seeder;

class DoctorTableSeed extends Seeder
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
            'code'=>'2590',
            'expert'=>'اورولوژی',
            'day'=>'یکشنبه',
            'fhour'=>'18:00:00',
            'thour'=>'22:00:00',
            'date'=>'1395/11/18',]);

    }
}
