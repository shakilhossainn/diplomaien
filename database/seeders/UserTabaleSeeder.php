<?php

namespace Database\Seeders;

use Database\Seeders\DatabaseSeeder;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTabaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //user cerate
        USer::create([
            'name'=>'Shakil Admind',
            'email'=>'shakil@gmail.com',
            'password'=>bcrypt('shakil1234'),
        ]);
    }
}
