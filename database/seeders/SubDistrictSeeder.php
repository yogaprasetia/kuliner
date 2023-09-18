<?php

namespace Database\Seeders;

use App\Models\SubDistrict;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            'Pacitan',
            'Pringkuku',
            'Parang',
            'Kebonagung',
            'Arjosari',
            'Nawangan',
            'Bandar',
            'Tegalombo',
            'Tulakan',
            'Donorojo',
            'Ngadirojo',
            'Sudimoro',
            'Punung',
            'Sambernyowo',
            'Batu Putih',
            'Bendungan',
            'Pucanglaban'
        ];

        foreach ($datas as $data) {
            SubDistrict::create([
                'name' => $data,
                'slug' => Str::slug($data)
            ]);
        }
    }
}
