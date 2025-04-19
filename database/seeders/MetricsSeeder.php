<?php

namespace Database\Seeders;

use App\Models\Metric;
use Illuminate\Database\Seeder;

class MetricsSeeder extends Seeder
{
    public function run()
    {
        Metric::create([
            'total_revenue' => 164000,
            'revenue_growth' => 7.4,
            'average_transaction' => 1250,
            'transaction_growth' => 8.2,
            'total_customers' => 3200,
            'customer_growth' => 12.5
        ]);
    }
}