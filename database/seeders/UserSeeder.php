<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = User::where('email', 'admin@admin.com')->first();
        if (is_null($superAdmin)) {
            $superAdmin = new User();
            $superAdmin->name = "Admin Khan";
            $superAdmin->email = "admin@admin.com";
            $superAdmin->user_type = "superadmin";
            $superAdmin->email_verified_at =  Carbon::now();
            $superAdmin->password = Hash::make('123456');
            $superAdmin->save();
        }
        $user = User::where('email', 'user@user.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Arman Khan";
            $user->email = "user@user.com";
            $user->user_type = "user";
            $user->email_verified_at =  Carbon::now();
            $user->password = Hash::make('123456');
            $user->save();
        }
    }
}
