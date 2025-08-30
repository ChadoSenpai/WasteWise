<?php

namespace Database\Seeders;

use App\Models\Barangay;
use Illuminate\Database\Seeder;

class BarangaySeeder extends Seeder
{
    public function run(): void
    {
        $barangays = [
            ['name' => 'Alipit'],
            ['name' => 'Bagumbayan'],
            ['name' => 'Bubukal'],
            ['name' => 'Calios'],
            ['name' => 'Duhat'],
            ['name' => 'Gatid'],
            ['name' => 'Jasaan'],
            ['name' => 'Labuin'],
            ['name' => 'Malinao'],
            ['name' => 'Oogong'],
            ['name' => 'Pagsawitan'],
            ['name' => 'Palasan'],
            ['name' => 'Patimbao'],
            ['name' => 'Poblacion I'],
            ['name' => 'Poblacion II'],
            ['name' => 'Poblacion III'],
            ['name' => 'Poblacion IV'],
            ['name' => 'Poblacion V'],
            ['name' => 'San Jose'],
            ['name' => 'San Juan'],
            ['name' => 'San Pablo Norte'],
            ['name' => 'San Pablo Sur'],
            ['name' => 'Santisima Cruz'],
            ['name' => 'Santo Angel Central'],
            ['name' => 'Santo Angel Norte'],
            ['name' => 'Santo Angel Sur'],
        ];

        foreach ($barangays as $barangay) {
            Barangay::create($barangay);
        }

        $this->command->info('Successfully seeded barangays!');
    }
}
