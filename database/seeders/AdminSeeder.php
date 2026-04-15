<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'nama' => 'Admin Utama',
            'nip_nis' => 'ADMIN001',
            'kelas' => null,
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'nama' => 'Budi Santoso',
            'nip_nis' => 'SISWA001',
            'kelas' => 'X RPL 2',
            'role' => 'siswa',
            'password' => Hash::make('siswa123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'nama' => 'Siti Aminah',
            'nip_nis' => 'SISWA002',
            'kelas' => 'XI RPL 1',
            'role' => 'siswa',
            'password' => Hash::make('siswa123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
