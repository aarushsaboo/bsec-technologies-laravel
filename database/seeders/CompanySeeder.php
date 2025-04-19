<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $companies = [
            ['name' => 'Ubona'],
            ['name' => 'WolfX'],
            ['name' => 'LyondellBasell']
        ];
        
        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}