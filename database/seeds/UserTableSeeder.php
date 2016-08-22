<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 10)->create();

//        $seeder = ['John', 'Jake', 'Jerry', 'Jeremy', 'Johnny'];
////        $lastName = ['Smith', 'Walker', 'Santorum', 'Last', 'First'];
//        $email = ['656name@email.com', '43email@mail.com', '9this@email.com', '8mail@name.com', '67email@email.com', '5name@email.com', '4email@mail.com', '3this@email.com', '2mail@name.com', '1email@email.com'];
//
//        for($i = 0; $i<10; $i++){
//            $ranName = $seeder[mt_rand(0,4)];
////            $ranLast = $lastName[mt_rand(0,4)];
//            $ranMail = $email[$i];
//            $user1 = new App\User();
//            $user1->email = $ranMail;
//            $user1->name = $ranName;
//            $user1->password = Hash::make('password123');
//            $user1->save();
//        }


//        $user2 = new App\User();
//        $user2->email = 'user2@codeup.com';
//        $user2->name = 'Cam';
//        $user2->password = Hash::make('password123');
//        $user2->save();
    }
}
