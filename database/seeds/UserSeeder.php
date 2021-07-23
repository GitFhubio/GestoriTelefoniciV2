<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user1=new User();
        $user1->name='Admin';
        $user1->email='admin@outlook.it';
        $user1->password = Hash::make('beinformatica');
        $user1->save();
        $role1 = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'edit-users']);
        $role1->givePermissionTo($permission);
        $user1->assignRole($role1);

        $role2 = Role::create(['name' => 'operator']);

        $user2=new User();
        $user2->name='Tim';
        $user2->email='Tim@outlook.it';
        $user2->img='https://pbs.twimg.com/profile_images/687250413788106753/Of-4AHDY_400x400.png';
        $user2->password = Hash::make('beinformatica');
        $user2->save();
        $user2->assignRole($role2);

        $user2=new User();
        $user2->name='Vodafone';
        $user2->email='vodafone@outlook.it';
        $user2->img='https://ilsalvagente.it/wp-content/uploads/2016/03/vodafone-696x459.jpg';
        $user2->password = Hash::make('beinformatica');
        $user2->save();
        $user2->assignRole($role2);

        $user2=new User();
        $user2->name='windtre';
        $user2->email='windtre@outlook.it';
        $user2->img='https://wips.plug.it/cips/tecnologia/cms/2020/03/wind-tre.jpg';
        $user2->password = Hash::make('beinformatica');
        $user2->save();
        $user2->assignRole($role2);

    }



}
