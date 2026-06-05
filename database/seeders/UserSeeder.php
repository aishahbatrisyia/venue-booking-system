<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'matric_staff_no' => 'ADM0001',
                'email' => 'admin@iium.edu.my',
                'password' => 'Password123!',
                'role' => User::ROLE_ADMIN,
                'contact_no' => '01111111111',
                'department_name' => 'System Administration',
            ],
            [
                'name' => 'Nurul Huda',
                'matric_staff_no' => '2418232',
                'email' => 'nurul.huda@live.iium.edu.my',
                'password' => 'Password123!',
                'role' => User::ROLE_STUDENT,
                'contact_no' => '0123456789',
                'department_name' => 'Kulliyyah of ICT',
            ],
            [
                'name' => 'Ahmad Zain',
                'matric_staff_no' => 'STF1001',
                'email' => 'ahmad.zain@iium.edu.my',
                'password' => 'Password123!',
                'role' => User::ROLE_STAFF,
                'contact_no' => '0139876543',
                'department_name' => 'Kulliyyah of Engineering',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}