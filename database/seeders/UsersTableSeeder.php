<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Abdlazs',
                'email' => 'azis.remaristra@gmail.com',
                'password' => bcrypt('ahmadabdulazis'),
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];
        DB::table('users')->insert($users);
    }
}
