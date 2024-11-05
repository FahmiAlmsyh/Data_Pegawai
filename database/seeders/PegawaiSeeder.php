<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pegawai::create([
            'nama' => 'John Doe',
            'email' => 'john.doe@example.com',
            'phone' => '123456789',
            'birthdate' => Carbon::createFromFormat('Y-m-d', '1990-01-01'),
            'address' => '123 Main St, Anytown, USA',
            'position' => 'supervisor',
            'salary' => 5000000,
            'hire_date' => Carbon::createFromFormat('Y-m-d', '2020-01-15'),
            'employment_status' => 'magang',
            'photo' => 'default.png',
        ]);
    }
}
