<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'admin_role',
            'nama_lengkap' => 'Admin Role',
            'alamat' => 'Klaten',
            'no_hp' => '0888888888',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1234')
        ]);

        $admin->assignRole('Admin');

        $pelanggan = User::create([
            'username' => 'pelanggan',
            'nama_lengkap' => 'Pelanggan',
            'alamat' => 'Bandung',
            'no_hp' => '08123456789',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user1234')
        ]);

        $pelanggan->assignRole('Pelanggan');


    }
}
