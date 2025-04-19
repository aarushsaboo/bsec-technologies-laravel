<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\MonthlyData;
use Illuminate\Database\Seeder;

class MonthlyDataSeeder extends Seeder
{
    public function run()
    {
        $monthlyData = [
            [
                'month' => 'Jan 2025',
                'Ubona' => 45000,
                'WolfX' => 38000,
                'LyondellBasell' => 52000
            ],
            [
                'month' => 'Feb 2025',
                'Ubona' => 48000,
                'WolfX' => 41000,
                'LyondellBasell' => 55000
            ],
            [
                'month' => 'Mar 2025',
                'Ubona' => 52000,
                'WolfX' => 43000,
                'LyondellBasell' => 58000
            ],
            [
                'month' => 'Apr 2025',
                'Ubona' => 56000,
                'WolfX' => 46000,
                'LyondellBasell' => 62000
            ]
        ];
        
        $companies = Company::all();
        
        foreach ($monthlyData as $data) {
            $month = $data['month'];
            
            foreach ($companies as $company) {
                MonthlyData::create([
                    'month' => $month,
                    'company_id' => $company->id,
                    'revenue' => $data[$company->name]
                ]);
            }
        }
    }
}