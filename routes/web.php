<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Simple companies data endpoint with CORS headers
Route::get('/companies', function () {
    // Add CORS headers directly
    return response()->json([
        'companies' => [
            ['id' => 1, 'name' => 'Ubona'],
            ['id' => 2, 'name' => 'WolfX'],
            ['id' => 3, 'name' => 'LyondellBasell']
        ],
        'monthlyData' => [
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
        ],
        'metrics' => [
            'totalRevenue' => 164000,
            'revenueGrowth' => 7.4,
            'averageTransaction' => 1250,
            'transactionGrowth' => 8.2,
            'totalCustomers' => 3200,
            'customerGrowth' => 12.5
        ]
    ])->header('Access-Control-Allow-Origin', '*')
      ->header('Access-Control-Allow-Methods', 'GET')
      ->header('Access-Control-Allow-Headers', 'Content-Type');
});