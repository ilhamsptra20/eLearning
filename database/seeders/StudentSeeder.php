<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = Student::create([
            'name' => 'student',
            'no_induk' => '12345678901233',
            'birth' => now(),
            'contact' => '085893712441',
            'email' => 'student@email.com',
            'password' => Hash::make('12345678'),
        ]);

        $student->assignRole('student');
    }
}
