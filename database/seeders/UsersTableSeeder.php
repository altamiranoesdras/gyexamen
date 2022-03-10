<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        //Usuario admin
        User::factory(1)->create([
            "username" => "dev",
            "name" => "Developer",
            "password" => bcrypt("admin")
        ])->each(function (User $user){
            $user->syncRoles([Role::DEVELOPER]);
            $user->options()->sync(Option::pluck('id')->toArray());
                $user->shortcuts()->sync([
                1,
                12,
                13,
                14,
                15
            ]);
        });

        User::factory(1)->create([
            "username" => "Super",
            "name" => "Super Admin",
            "password" => bcrypt("123")
        ])->each(function (User $user){
            $user->syncRoles(Role::SUPERADMIN);
            $user->options()->sync(Option::pluck('id')->toArray());
                $user->shortcuts()->sync([
                1,
                12,
                13,
                14,
                15
            ]);

        });

        User::factory(1)->create([
            "username" => "gycurso01",
            "name" => "Usuario Admin",
            "password" => bcrypt("123")
        ])->each(function (User $user){
            $user->syncRoles(Role::ADMIN);
            $user->options()->sync(Option::pluck('id')->toArray());
            $user->shortcuts()->sync([
                1,
                12,
                13,
                14,
                15
            ]);

        });


        User::factory(1)->create([
            "username" => "gycurso02",
            "name" => "Usuario Supervisor",
            "password" => bcrypt("123")
        ])->each(function (User $user){
            $user->syncRoles(Role::SUPERVISOR);
            $user->options()->sync(Option::pluck('id')->toArray());
            $user->shortcuts()->sync([
                1,
                12,
                13,
                14,
                15
            ]);

        });

        User::factory(1)->create([
            "username" => "gycurso03",
            "name" => "Usuario Operador",
            "password" => bcrypt("123")
        ])->each(function (User $user){
            $user->syncRoles(Role::OPERADOR);
            $user->options()->sync(Option::pluck('id')->toArray());
            $user->shortcuts()->sync([
                1,
                12,
                13,
                14,
                15
            ]);

        });
    }
}
