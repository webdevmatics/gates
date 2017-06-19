<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author = Role::create([
            'name'        => 'Author',
            'slug'        => 'author',
            'permissions' => json_encode([
                'create-post' => true,
            ]),
        ]);

        $editor = Role::create([
            'name'        => 'Editor',
            'slug'        => 'editor',
            'permissions' => json_encode([
                'update-post'  => true,
                'publish-post' => true,
            ]),
        ]);
    }
}
