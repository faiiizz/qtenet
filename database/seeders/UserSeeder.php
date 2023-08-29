<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {

    $data = [
        [
            'nama' => 'Administrator',
            'email' => 'admin@gmail.com',
            'avatar' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('admin12'),
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nama' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'avatar' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('superadmin12'),
            'role' => 'superadmin',
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nama' => 'karyawan',
            'email' => 'karyawan@gmail.com',
            'avatar' => null,
            'email_verified_at' => now(),
            'password' => Hash::make('karyawan12'),
            'role' => 'karyawan',
            'created_at' => now(),
            'updated_at' => now()
        ]
    ];

        User::insert($data);
    }
}

