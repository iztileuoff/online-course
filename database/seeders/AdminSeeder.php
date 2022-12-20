<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = User::create([
            'name' => 'Admin',
            'phone' => '998995554466',
            'password' => Hash::make('minda123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Role::create([
            'name' => 'super-admin',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $superadmin->assignRole('super-admin');
    }
}
