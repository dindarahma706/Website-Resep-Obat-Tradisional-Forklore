<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userCsfFile = fopen(base_path("database/data/user.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($userCsfFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                User::create([
                    "name" => $data['0'],
                    "email" => $data['1'],
                    "password"=>Hash::make($data['2']),
                    'role_as'=>$data['3'],
                    'status'=>$data['4']
                ]);
            }
            $firstline = false;
        }

        fclose($userCsfFile);

    }
}
