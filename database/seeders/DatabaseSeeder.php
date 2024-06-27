<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->id = 1;
        $user->name = 'BlogAdmin';
        $user->email = 'blogadmin@gmail.com';
        $user->email_verified_at = null;
        $user->password = Hash::make('12345');
        $user->username = 'BlogAdmin123';
        $user->picture = null;
        $user->biography = '';
        $user->type = 1;
        $user->blocked = 0;
        $user->direct_publish = 1;
        $user->remember_token = null;
        $user->created_at = null;
        $user->updated_at = null;

        $user->save();

        $user2 = new User;
        $user2->id = 2;
        $user2->name = 'BlogUser';
        $user2->email = 'bloguser@gmail.com';
        $user2->email_verified_at = null;
        $user2->password = Hash::make('12345');
        $user2->username = 'BlogUser123';
        $user2->picture = null;
        $user2->biography = '';
        $user2->type = 2;
        $user2->blocked = 0;
        $user2->direct_publish = 0;
        $user2->remember_token = null;
        $user2->created_at = null;
        $user2->updated_at = null;

        $user2->save();
    }
}
