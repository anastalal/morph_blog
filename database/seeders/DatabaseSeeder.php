<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use BezhanSalleh\FilamentShield\Support\Utils;
use Filament\Commands\MakeUserCommand as FilamentMakeUserCommand;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"super_admin","guard_name":"web","permissions":["view_category","view_any_category","create_category","update_category","restore_category","restore_any_category","replicate_category","reorder_category","delete_category","delete_any_category","force_delete_category","force_delete_any_category","view_post","view_any_post","create_post","update_post","restore_post","restore_any_post","replicate_post","reorder_post","delete_post","delete_any_post","force_delete_post","force_delete_any_post","view_role","view_any_role","create_role","update_role","delete_role","delete_any_role","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user","widget_StatsOverview"]},{"name":"panel_user","guard_name":"web","permissions":["view_post","view_any_post","create_post","update_post","restore_post","delete_post"]}]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);
        static::makeStartSeeder();
        $this->command->info('👋  Hello Morph Team. Login with admin@morph.sa and password is morph@admin. ');
       

    }
    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions,true))) {

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = Utils::getRoleModel()::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name']
                ]);

                if (! blank($rolePlusPermission['permissions'])) {

                    $permissionModels = collect();

                    collect($rolePlusPermission['permissions'])
                        ->each(function ($permission) use($permissionModels) {
                            $permissionModels->push(Utils::getPermissionModel()::firstOrCreate([
                                'name' => $permission,
                                'guard_name' => 'web'
                            ]));
                        });
                    $role->syncPermissions($permissionModels);

                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions,true))) {

            foreach($permissions as $permission) {

                if (Utils::getPermissionModel()::whereName($permission)->doesntExist()) {
                    Utils::getPermissionModel()::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
    protected static function makeStartSeeder(): void{
        $filamentMakeUserCommand = new FilamentMakeUserCommand();
        $reflector = new \ReflectionObject($filamentMakeUserCommand);

        $getUserModel = $reflector->getMethod('getUserModel');
        $getUserModel->setAccessible(true);
        $getUserModel->invoke($filamentMakeUserCommand)::create([
            'name' => 'Morph',
            'email' => 'admin@morph.sa',
            'password' => Hash::make('morph@admin'),
        ]);
        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Models\User',
            'model_id' =>  1,
           
        ]);

        // إضافة بيانات فئة
      DB::table('categories')->insert([
            'name' => 'عام',
            'slug' => 'default',
            'description' => 'This is the default category.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // إضافة بيانات منشور
        DB::table('posts')->insert([
            'title' => 'مقالة تجريبية',
            'slog' => 'مورف',
            'content' => '<h1 class="text-[30px] lg:text-[42px] text-[#242D4C] font-tajawal font-bold pb-4 lg:pb-10 aos-init aos-animate" style="box-sizing: border-box; border: 0px solid #e5e7eb; --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-scroll-snap-strictness: proximity; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; font-size: 42px; margin: 0px; font-family: __tajawal_c0c536, __tajawal_Fallback_c0c536, sans-serif; padding-bottom: 2.5rem; --tw-text-opacity: 1; color: rgb(36 45 76/var(--tw-text-opacity)); transform: translateZ(0px); opacity: 1; transition-property: opacity, transform; transition-duration: 0.3s; transition-timing-function: ease; background-color: #ffffff; scroll-behavior: smooth !important;" data-aos="fade-left" data-aos-duration="300" data-aos-easing="ease" data-aos-delay="0" data-aos-offset="0">ما هي مورف</h1>
            <p><span style="color: #29264d; font-family: __tajawal_c0c536, __tajawal_Fallback_c0c536, sans-serif; font-size: 20px; background-color: #ffffff;">مورف مؤسسة سعودية تسعى لتقديم الحلول التقنية الذكية للجهات الحكومية والخاصة والأفراد من خلال تقديم خدمات البرمجة والتطوير للمنصات والمواقع والتطبيقات بتجربة استخدام مميزة وواجهات عملية.</span></p>',
            'user_id' => 1,
            'category_id' => 1,
            'published_at' => now(),
            'views' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
