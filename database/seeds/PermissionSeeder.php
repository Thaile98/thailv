<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
        	[
        		'name' => 'role-list',
        		'display_name' => 'Display Role Listing',
        		'description' => 'See only Listing Of Role'
        	],
        	[
        		'name' => 'role-create',
        		'display_name' => 'Create Role',
        		'description' => 'Create New Role'
        	],
        	[
        		'name' => 'role-edit',
        		'display_name' => 'Edit Role',
        		'description' => 'Edit Role'
        	],
        	[
        		'name' => 'role-delete',
        		'display_name' => 'Delete Role',
        		'description' => 'Delete Role'
        	],
        	[
        		'name' => 'article-list',
        		'display_name' => 'Display article Listing',
        		'description' => 'See only Listing Of article'
        	],
        	[
        		'name' => 'article-create',
        		'display_name' => 'Create article',
        		'description' => 'Create New article'
        	],
        	[
        		'name' => 'article-edit',
        		'display_name' => 'Edit article',
        		'description' => 'Edit article'
        	],
        	[
        		'name' => 'article-delete',
        		'display_name' => 'Delete article',
        		'description' => 'Delete article'
        	],
        	[
        		'name' => 'user-list',
        		'display_name' => 'Display user Listing',
        		'description' => 'See only Listing Of user'
        	],
        	[
        		'name' => 'user-create',
        		'display_name' => 'Create user',
        		'description' => 'Create New user'
        	],
        	[
        		'name' => 'user-edit',
        		'display_name' => 'Edit user',
        		'description' => 'Edit user'
        	],
        	[
        		'name' => 'user-delete',
        		'display_name' => 'Delete user',
        		'description' => 'Delete user'
        	]
        ];


        foreach ($permission as $key => $value) {
        	Permission::create($value);
        }
    }
}
