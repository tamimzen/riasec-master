<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert data superadmin, admin, pengguna default
        DB::table('users')->insert(array(
            [
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'slug' => 'super-admin',
                'nim' => '62123456789',
                'programstudi_id' => '1',
                'email' => 'superadmin@gmail.com',
                'password' => bcrypt('katasandi'),
                'phone' => '0912834585'
        ],
            [
                'name' => 'Admin JPC',
                'username' => 'adminjpc',
                'slug' => 'admin-jpc',
                'nim' => '123456789',
                'programstudi_id' => '1',
                'email' => 'adminjpc@gmail.com',
                'password' => bcrypt('katasandi'),
                'phone' => '0912834585'
        ],
            [
                'name' => 'Pengguna JPC',
                'username' => 'penggunajpc',
                'slug' => 'pengguna-jpc',
                'nim' => '234567890',
                'programstudi_id' => '6',
                'email' => 'penggunajpc@gmail.com',
                'password' => bcrypt('password123'),
                'phone' => '082342334320'
        ]));

        // insert role superadmin, admin, pengguna
        DB::table('role_users')->insert(array(
            [
                'user_id' => '1',
                'role_id' => '1'
        ],
            [
                'user_id' => '2',
                'role_id' => '2',
        ],
            [
                'user_id' => '3',
                'role_id' => '3'
        ]));
        
    }
}
