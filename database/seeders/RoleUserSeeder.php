<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\ManagementAccess\RoleUser;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::findOrFail(1)->role()->sync(1);
        User::findOrFail(2)->role()->sync(2);
        User::findOrFail(3)->role()->sync(3);
        User::findOrFail(4)->role()->sync(4);
        User::findOrFail(5)->role()->sync(5);
    }
}
