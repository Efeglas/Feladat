<?php

use Illuminate\Database\Seeder;
use App\Adminuser;
use App\Emails;

class AdminUsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adminuser::create ([
            'username'  => 'admin',
            'password' => Hash::make('admin')           
        ]);

        Emails::create([
            'email' => 'gaborattila.testemail@gmail.com',
            'lastsent' => '2019-10-27 08:00:00'
        ]);
    }
}
