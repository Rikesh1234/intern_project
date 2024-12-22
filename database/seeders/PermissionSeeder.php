<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;


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
            //Post
            ['name'=>'Post Create', 'slug' => 'post-create'],
            ['name'=>'Post Read', 'slug' => 'post-read'],
            ['name'=>'Post Update', 'slug' => 'post-update'],
            ['name'=>'Post Delete', 'slug' => 'post-delete'],

            //Author
            ['name'=>'Author Create', 'slug' => 'author-create'],
            ['name'=>'Author Read', 'slug' => 'author-read'],
            ['name'=>'Author Update', 'slug' => 'author-update'],
            ['name'=>'Author Delete', 'slug' => 'author-delete'],

            //Category
            ['name'=>'Category Create', 'slug' => 'category-create'],
            ['name'=>'Category Read', 'slug' => 'category-read'],
            ['name'=>'Category Update', 'slug' => 'category-update'],
            ['name'=>'Category Delete', 'slug' => 'category-delete'],

            //Page
            ['name'=>'Page Create', 'slug' => 'page-create'],
            ['name'=>'Page Read', 'slug' => 'page-read'],
            ['name'=>'Page Update', 'slug' => 'page-update'],
            ['name'=>'Page Delete', 'slug' => 'page-delete'],

            //User
            ['name'=>'User Create', 'slug' => 'user-create'],
            ['name'=>'User Read', 'slug' => 'user-read'],
            ['name'=>'User Update', 'slug' => 'user-update'],
            ['name'=>'User Delete', 'slug' => 'user-delete'],

            //role
            ['name'=>'Role Create', 'slug' => 'role-create'],
            ['name'=>'Role Read', 'slug' => 'role-read'],
            ['name'=>'Role Update', 'slug' => 'role-update'],
            ['name'=>'Role Delete', 'slug' => 'role-delete'],

            ['name'=>'Permission Create', 'slug' => 'permission-create'],
            ['name'=>'Permission Read', 'slug' => 'permission-read'],
            ['name'=>'Permission Update', 'slug' => 'permission-update'],
            ['name'=>'Permission Delete', 'slug' => 'permission-delete'],

            ['name'=>'SEO Create', 'slug' => 'seo-create'],
            ['name'=>'SEO Read', 'slug' => 'seo-read'],
            ['name'=>'SEO Delete', 'slug' => 'seo-delete'],
            ['name'=>'SEO Update', 'slug' => 'seo-update'],
        ];

        foreach ($permission as $permissions) {
            Permission::create([
                'name' => $permissions['name'],
                'slug' => $permissions['slug'],
            ]);

    }
}
}
