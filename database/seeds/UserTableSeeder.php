<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserTableSeeder extends Seeder {

    private function randDate()
    {
        return Carbon::createFromDate(null, rand(1, 12), rand(1, 28));
    }

    public function run()
    {
        DB::table('users')->delete();
        DB::table('properties')->delete();

        for($i = 0; $i < 3; ++$i)
        {
            DB::table('users')->insert([
                'name' => 'Name' . $i,
                'email' => 'email' . $i . '@blop.fr',
                'password' => bcrypt('password' . $i)
            ]);

            $date = $this->randDate();
            DB::table('properties')->insert([
                'longitude' => rand(1,180), # -180 / 180
                'latitude' => rand(1,90), # -90 / 90
                'user_id' => $i + 1,
                'created_at' => $date,
                'updated_at' => $date
            ]);
        }
    }
}