<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);
        $writerRole = Role::create(['name' => 'Writer', 'display_name' => 'Escritor']);
        $userRole = Role::create(['name' => 'User', 'display_name' => 'Usuario']);

        $viewPostPermission = Permission::create(['name' => 'View posts']);
        $createPostPermission = Permission::create(['name' => 'Create posts']);
        $updatePostPermission = Permission::create(['name' => 'Update posts']);
        $deletePostPermission = Permission::create(['name' => 'Delete posts']);

        $viewUserPermission = Permission::create(['name' => 'View users']);
        $createUserPermission = Permission::create(['name' => 'Create users']);
        $updateUserPermission = Permission::create(['name' => 'Update users']);
        $deleteUserPermission = Permission::create(['name' => 'Delete users']);

        $viewRolePermission = Permission::create(['name' => 'View roles']);
        $createRolePermission = Permission::create(['name' => 'Create roles']);
        $updateRolePermission = Permission::create(['name' => 'Update roles']);
        $deleteRolePermission = Permission::create(['name' => 'Delete roles']);

        $deleteCommentPermission = Permission::create(['name' => 'Delete comments']);

        $admin = new User;
        $admin->name = 'Ivan';
        $admin->age = 22;
        $admin->email = 'ivan@gmail.com';
        $admin->password = '123456';
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'Juan';
        $writer->age = 45;
        $writer->email = 'juan@gmail.com';
        $writer->password = '123456';
        $writer->save();

        $writer->assignRole($adminRole);
        $writer->assignRole($writerRole);

        $user = new User;
        $user->name = 'Pedro';
        $user->age = 25;
        $user->email = 'pedro@gmail.com';
        $user->password = '123456';
        $user->save();

        $user->assignRole($userRole);

        $users = factory(User::class, 8)->make();

        $users->each(function ($u) use($writerRole){
            $u->save();
            $u->assignRole($writerRole);
        });
    }
}
