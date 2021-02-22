<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $admin_role = Role::where('name', 'admin')->first();
        $admin_role = Role::where('name', 'user')->first();
        $admin_role = Role::where('name', 'medical')->first();
        $admin_role = Role::where('name', 'external')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('jinyutan99')
        ]);

        $user = User::create([
            'name' => 'Eren Ong',
            'email' => 'ongshaoan@gmail.com',
            'password' => Hash::make('jinyutan99')
        ]);

        $medical = User::create([
            'name' => 'Psychologist User',
            'email' => 'medical@gmail.com',
            'password' => Hash::make('jinyutan99')
        ]);

        $external = User::create([
            'name' => 'External User',
            'email' => 'ext@gmail.com',
            'password' => Hash::make('jinyutan99')
        ]);

        $admin->roles()->attach($admin_role);
        $user->roles()->attach($user);
        $medical->roles()->attach($medical);
        $external->roles()->attach($external);
    }
}
