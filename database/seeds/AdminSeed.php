<?php

use Illuminate\Database\Seeder;
use App\Modules\User\Models\User;
class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'first_name'=>'admin',
            'last_name'=>'admin',
            'email'=>'admin@prcom.com',
            'password'=>bcrypt('admin'),
            'role_id'=>1,
            'status'=>1,
        ]);
    }
}
