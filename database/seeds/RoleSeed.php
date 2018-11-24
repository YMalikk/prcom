<?php

use Illuminate\Database\Seeder;
use App\Modules\User\Models\Role;
class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create([
            'title' => 'admin'
        ]);

        Role::create([
            'title' => 'steward'
        ]);

        Role::create([
            'title'=>'pilot'
        ]);


    }
}
