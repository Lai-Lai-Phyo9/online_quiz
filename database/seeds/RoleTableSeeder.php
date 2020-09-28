<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;
        $role->name = 'admin';
        $role->guard_name = 'web';
        $role->save();

        $role = new Role;
        $role->name = 'quiz maker';
        $role->guard_name = 'web';
        $role->save();
        
        $role = new Role;
        $role->name = 'participant';
        $role->guard_name = 'web';
        $role->save();
    }
}
