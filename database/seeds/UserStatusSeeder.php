<?php

use App\UserStatus;
use Illuminate\Database\Seeder;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        UserStatus::create([
        'nombre' => 'Registrado',
        'status' => 0
        ]); 
    }
}
