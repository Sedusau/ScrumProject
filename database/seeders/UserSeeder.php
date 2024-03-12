<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();

        $user->name = "Alfredo Barbery";
        $user->email = "alfredo123@gmail.com";
        $user->password ="12345678";
        $user->save(); 
        // Asignar el rol al usuario
        $user->assignRole('Product Owner');


        
        $user2 = new User();

        $user2->name = "Natalia Maldonado";
        $user2->email = "nati123@gmail.com";
        $user2->password ="12345678";
        $user2->save(); 
        $user2->assignRole('Scrum Master');


        
        $user3 = new User();

        $user3->name = "Camila Montevideo";
        $user3->email = "camila123@gmail.com";
        $user3->password ="12345678";
        $user3->save(); 
        $user3->assignRole('Developers');

    }
}
