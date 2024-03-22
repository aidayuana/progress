<?php

namespace Database\Seeders;

use App\Models\Konfigurasi\Menu;
use App\Models\Permission;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class MenuSeeder extends Seeder
{
    use HasMenuPermission;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cache::forget('menus');
        /**
         * @var Menu $mm
         */
        $mm = Menu::firstOrCreate(['url' => 'konfigurasi'],['name' => 'Konfigurasi', 'category' => 'MASTER DATA', 'icon' => 'settings']);
        $this->attachMenupermission($mm, ['read'], ['schooladmin']);
        
        $sm = $mm->subMenus()->create(['name' => 'Menu', 'url' => $mm->url. '/menu', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete', 'sort'], ['schooladmin']);
        
        $sm = $mm->subMenus()->create(['name' => 'Role', 'url' => $mm->url. '/roles', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['schooladmin']);

        $sm = $mm->subMenus()->create(['name' => 'Permission', 'url' => $mm->url. '/permissions', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['create', 'read', 'update', 'delete'], ['schooladmin']);

        $sm = $mm->subMenus()->create(['name' => 'Akses Role', 'url' => $mm->url. '/akses-role', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read', 'update'], ['schooladmin']);

        $sm = $mm->subMenus()->create(['name' => 'Akses User', 'url' => $mm->url. '/akses-user', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read', 'update'], ['schooladmin']);

        $sm = $mm->subMenus()->create(['name' => 'Users', 'url' => $mm->url. '/users', 'category' => $mm->category]);
        $this->attachMenupermission($sm, null, ['schooladmin']);

        $mm = Menu::firstOrCreate(['url' => 'master-data'],['name' => 'Master Data', 'category' => 'MASTER DATA', 'icon' => 'book']);
        $this->attachMenupermission($mm, ['read'], ['schooladmin']);
        
        $sm = $mm->subMenus()->create(['name' => 'Tags', 'url' => $mm->url. '/tags', 'category' => $mm->category]);
        $this->attachMenupermission($sm, null, ['schooladmin']);
        
        $mm = Menu::firstOrCreate(['url' => 'article'],['name' => 'Article', 'category' => 'CONTENT', 'icon' => 'book']);
        $this->attachMenupermission($mm, null, ['schooladmin', 'teacher', 'student']);
        $this->attachMenupermission($mm, ['approve'], ['teacher']);
    }
}
