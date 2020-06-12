<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            'superadmin' => [
                'name' => 'Superadmin',
                'email' => 'superadmin@example.com',
                'username' => 'superadmin',
                'mobile' => '012345678',
                'password' => bcrypt('secret'),
                'email_verified_at' => now(),
                'role' => 'superadmin',
            ],
            'admin' => [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'username' => 'admin',
                'mobile' => '0123456789',
                'password' => bcrypt('secret'),
                'email_verified_at' => now(),
                'role' => 'admin',
            ],
            'user' => [
                'name' => 'User',
                'email' => 'user@example.com',
                'username' => 'user',
                'password' => bcrypt('secret'),
                'email_verified_at' => now(),
                'role' => 'user',
            ],
        ];
        foreach ($users as $user){
            $role = $user['role'];
            unset($user['role']);
            User::create($user)->assignRole($role);
        }
        factory(App\Models\User::class, 100)->create()->each(function ($user) {
            $user->assignRole('user');
        });
    }
}
