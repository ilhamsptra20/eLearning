<?php

namespace Database\Seeders;

use App\Models\Lecturer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lecturer = Lecturer::create([
            'name' => 'lecturer',
            'no_induk' => '12345678901234',
            'birth' => now(),
            'contact' => '085893712441',
            'email' => 'lecturer@email.com',
            'password' => Hash::make('12345678'),
        ]);

        $lecturer->assignRole('lecturer');
    }
}
