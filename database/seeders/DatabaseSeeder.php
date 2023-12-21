<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@morph.sa',
            'password' => Hash::make('morph12345'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // إضافة بيانات فئة
        DB::table('categories')->insert([
            'name' => 'Default Category',
            'slug' => 'default-category',
            'description' => 'This is the default category.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // إضافة بيانات منشور
        DB::table('posts')->insert([
            'title' => 'مقالة تجريبية',
            'slog' => Str::slug('مقالة تجريبية'),
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
