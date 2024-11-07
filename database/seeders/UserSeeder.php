<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        tap(User::create([
            'name' => "Mario Nobre",
            'email' => "m.nobre@ymail.com",
            'password' => Hash::make("password"),
        ]), function (User $user) {

            $adminTeam = Team::forceCreate([
                'user_id' => $user->id,
                'name' => "Admin's Team",
                'personal_team' => true,
            ]);

            $userTeam = Team::forceCreate([
                'user_id' => $user->id,
                'name' => "User's Team",
                'personal_team' => false,
            ]);

            $user->ownedTeams()->save($adminTeam);
            $user->ownedTeams()->save($userTeam);
            $user->switchTeam($adminTeam);

            
        });

        tap(User::create([
            'name' => "Luis",
            'email' => "luis@test.pt",
            'password' => Hash::make("password"),
        ]), function (User $user) {

            $adminTeam = Team::forceCreate([
                'user_id' => $user->id,
                'name' => "Admin's Team",
                'personal_team' => true,
            ]);

            $userTeam = Team::forceCreate([
                'user_id' => $user->id,
                'name' => "User's Team",
                'personal_team' => false,
            ]);

            $user->ownedTeams()->save($adminTeam);
            $user->ownedTeams()->save($userTeam);
            $user->switchTeam($adminTeam);

            
        });

    }
}

