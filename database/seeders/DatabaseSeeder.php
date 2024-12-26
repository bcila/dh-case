<?php

namespace Database\Seeders;

use App\Models\AboutMe;
use App\Models\ContactInfo;
use App\Models\ContactMessage;
use App\Models\Portfolio;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        AboutMe::create([
            'biography' => 'Merhaba! Ben bir Backend Developerim. 2022 yılında Bilgisayar Mühendisliği bölümünden mezun oldum. PHP, NodeJs/NestJS, Python gibi teknolojiler konusunda deneyimliyim. Sürekli kendimi geliştirmeye ve yeni teknolojiler öğrenmeye odaklanıyorum. Temiz kod yazmaya özen gösterir, modern yazılım geliştirme pratiklerini takip ederim.',
            'hobbies' => [
                'Kod Yazmak',
                'Yeni Teknolojiler Öğrenmek',
                'Doğada Vakit Geçirmek',
                'Video Oyunları Oynamak',
                'Açık Kaynak Projelerine Katkı Yapmak'
            ],
            'phobias' => [
                'Kodun Gece Yarısı Çökmesi',
                'Arachnophobia',
            ]
        ]);

        Portfolio::create([
            'title' => 'Üniversite',
            'description' => 'Iskenderun Teknik Universitesi - Bilgisayar Mühendisliği Bölümü',
            'type' => 'school'
        ]);

        Portfolio::create([
            'title' => 'Lise',
            'description' => 'Merkez Anadolu Lisesi',
            'type' => 'school'
        ]);

        Portfolio::create([
            'title' => 'E-Ticaret Projesi',
            'description' => 'NextJs ve RectJs kullanılarak geliştirilmiş kapsamlı bir e-ticaret platformu. Ürün yönetimi, sepet işlemleri, ödeme entegrasyonu ve admin paneli içerir.',
            'type' => 'project'
        ]);

        Portfolio::create([
            'title' => 'Blog Sistemi',
            'description' => 'Modern blog yönetim sistemi. NestJs ve NextJs kullanılarak geliştirildi. SEO dostu URL yapısı, kategori yönetimi ve zengin metin editörü içerir.',
            'type' => 'project'
        ]);

        Portfolio::create([
            'title' => 'API Geliştirme Projesi',
            'description' => 'RESTful API geliştirme. NodeJs ve Express kullanılarak, JSON tabanlı veri yönetimi ve JWT tabanlı kimlik doğrulama içerir.',
            'type' => 'project'
        ]);

        ContactMessage::create([
            'name' => 'Ahmet Yılmaz',
            'email' => 'ahmet@example.com',
            'phone' => '555-0123',
            'message' => 'Merhaba, projeniz hakkında bilgi almak istiyorum.'
        ]);

        ContactMessage::create([
            'name' => 'Ayşe Demir',
            'email' => 'ayse@example.com',
            'phone' => '555-4567',
            'message' => 'Yeni bir proje hakkiında bilgi vermek istiyorum.'
        ]);

        ContactInfo::create([
            'address' => 'Örnek Mahallesi, Test Sokak No:1, İstanbul',
            'phone' => '0(555) 123 45 67',
            'latitude' => 38.42551501,
            'longitude' => 27.13870966
        ]);
    }
}
