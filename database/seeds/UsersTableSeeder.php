<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'Super Admin',
            'username' => 'administrator',
            'password' => bcrypt('superadmin'),
            'email' => 'admin@nore.web.id',
            'role' => '1',
        ]);
    }
}
