<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Permissions
        $lookDashBoard = Permission::create([
            'name' => 'look-dashboard',
            'guard_name' => 'web'
        ]);
        $editProductCategories = Permission::create([
            'name' => 'edit-product-categories',
            'guard_name' => 'web'

        ]);
        $editProducts = Permission::create([
            'name' => 'edit-products',
            'guard_name' => 'web'
        ]);
        $editJobCategories = Permission::create([
            'name' => 'edit-job-categories',
            'guard_name' => 'web'
        ]);
        $editEmployeeAccounts = Permission::create([
            'name' => 'edit-Employee-Accounts',
            'guard_name' => 'web'
        ]);
        //Roles
        $admin = Role::create(['name' => 'admin']);
        // $admin->givePermissionTo($lookDashBoard, $editProductCategories, $editProducts, $editJobCategories, $editEmployeeAccounts);
        $writer = Role::create(['name' => 'writer']);
        $employee = Role::create(['name' => 'employee']);
        $client = Role::create(['name' => 'client']);
    }
}
