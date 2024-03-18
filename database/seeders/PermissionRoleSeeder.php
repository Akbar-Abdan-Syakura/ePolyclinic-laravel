<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ManagementAccess\Permission;
use App\Models\ManagementAccess\Role;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for super admin
        $admin_permissions = Permission::all();
        Role::findOrFail(1)->permission()->sync($admin_permissions->pluck('id'));

        // get permission for admin
        $user_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permission()->sync($user_permissions);

        // get permission for staff clinic
        $staf_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_' && substr($permission->title, 0, 10) != 'type_user_' && substr($permission->title, 0, 15) != 'config_payment_';
        });
        Role::findOrFail(3)->permission()->sync($staf_permissions);

        // get permission for doctor
        $doctor_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_' && substr($permission->title, 0, 10) != 'type_user_' && substr($permission->title, 0, 15) != 'config_payment_' && substr($permission->title, 0, 13) != 'consultation_' && substr($permission->title, 0, 5) != 'poli_' && substr($permission->title, 0, 7) != 'doctor_';
        });
        Role::findOrFail(4)->permission()->sync($doctor_permissions);

        // get permission for patient
        $doctor_permissions = $admin_permissions->filter(function ($permission) {
            return substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_' && substr($permission->title, 0, 10) != 'type_user_' && substr($permission->title, 0, 15) != 'config_payment_' && substr($permission->title, 0, 13) != 'consultation_' && substr($permission->title, 0, 5) != 'poli_' && substr($permission->title, 0, 7) != 'doctor_' && substr($permission->title, 0, 15) != 'clinic_patient_' && substr($permission->title, 0, 12) != 'appointment_' && substr($permission->title, 0, 12) != 'transaction_';
        });
        Role::findOrFail(5)->permission()->sync($doctor_permissions);
    }
}
