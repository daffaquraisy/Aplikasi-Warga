<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->name = 'Admin';
        $administrator->email = 'admin@gmail.com';
        $administrator->roles = json_encode(["ADMIN"]);
        $administrator->phone = '087635353';
        $administrator->password = \Hash::make('12345678');

        $administrator->save();
        $this->command->info("User Admin berhasil diinsert");
    }
}
