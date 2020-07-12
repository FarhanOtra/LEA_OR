<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{

    public function run()
    {
        $user = factory(App\Models\User::class)->create([
            'username' => 'admin',
            'name' => 'Administrator',
            'password' => bcrypt('admin'),
            'email' => 'admin@admin.com',
            'type' => 3,
            'active' => 1
        ]);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $system_roles = config('central.system_roles');

        $admin = null;
        foreach ($system_roles as $type => $role) {
            if ($type == 'administrator')
                $admin = Role::create(['name' => $role]);
            else
                Role::create(['name' => $role]);
        }

        $permissions = [
            'users_manage',
            'roles_access',
            'roles_manage',
            'departments_access',
            'departments_manage',
            'faculties_access',
            'faculties_manage',
            'students_access',
            'students_manage',
            'lecturers_access',
            'lecturers_manage',
            'staffs_access',
            'staffs_manage',
            'rooms_access',
            'rooms_manage'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
            $admin->givePermissionTo($permission);
        }

        $user->assignRole('admin');
    }
}
