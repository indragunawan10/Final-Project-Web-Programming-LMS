<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['user_name'=>'admin', 'email'=>'admin@admin.com', 'password'=>bcrypt('password'), 'user_role'=>'admin'],
            ['user_name'=>'member', 'email'=>'member@member.com', 'password'=>bcrypt('password'), 'user_role'=>'member'],
        ];
        DB::table('users')->insert($users);


        $transaction = [
            ['user_id'=>'1'],
            ['user_id'=>'2']
        ];
        DB::table('transaction_headers')->insert($transaction);
    }
}
