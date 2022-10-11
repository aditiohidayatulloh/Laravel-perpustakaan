<?php

namespace Database\Seeders;

use App\models\Buku;
use App\models\User;
use App\models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the Application's database.
     *
     * @return void
     */
    public function run()
    {
     //App\models\User::factory(10)->create();

     User::create([
        'name'=> 'Admin',
        'email'=>'admin@admin.com',
        'password' => Hash::make('admin123'),
        'isAdmin' => '1',
     ]);

    Kategori::create([
        'nama'=>'Novel',
        'deskripsi' => 'Kumpulan Novel'
    ]);
    Kategori::create([
        'nama'=>'Pelajaran',
        'deskripsi' => 'Kumpulan Buku materi pelajaran'
    ]);
    }
}
