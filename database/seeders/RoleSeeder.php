<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $lecturerRole = Role::create([
            'name' => 'lecturer',
            'guard_name' => 'lecturer',
        ]);

        $studentRole = Role::create([
            'name' => 'student',
            'guard_name' => 'student',
        ]);


    }
}
