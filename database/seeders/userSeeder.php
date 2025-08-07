<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name"=> "yassin",
            "email"=> "ss@gmail.com",
            "password"=>Hash::make("12345"),
            "number"=> "7788999",
            "cantry"=> "yamin",
            "city"=> "zabid",
            "street"=> "wadi",
            "usertype"=> "admin",


        ]);
      
        User::create([
            "name"=> "Ahmed",
            "email"=> "a@gmail.com",
            "password"=>Hash::make("1234"),
            "number"=> "77999",
            "cantry"=> "yamin",
            "city"=> "zabid",
            "street"=> "wadi",
            "usertype"=> "user",


        ]);

        //
    }
}
