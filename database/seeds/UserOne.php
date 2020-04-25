<?php

use Illuminate\Database\Seeder;

class UserOne extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'aphoe';
        $user->email = 'aphoe@outlook.com';
        $user->password = \Hash::make('qwerty');
        $user->save();
    }
}
