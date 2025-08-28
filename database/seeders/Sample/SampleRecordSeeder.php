<?php

namespace Database\Seeders\Sample;

use App\Models\Record;
use App\Models\Sample\SampleRecord;
use Illuminate\Database\Seeder;

class SampleRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SampleRecord::factory()
            ->count(32)
            ->create();
    }
}
