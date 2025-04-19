<?php

use App\Models\Company;
use App\Models\MonthlyData;
use App\Models\Metric;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Enhanced companies endpoint with database integration
Route::get('/companies', function () {
    // Get all companies
    $companies = Company::all();
    
    // Get all monthly data
    $monthlyDataRaw = MonthlyData::all()->groupBy('month');
    
    // Format monthly data into the expected structure
    $monthlyData = [];
    foreach ($monthlyDataRaw as $month => $entries) {
        $monthData = ['month' => $month];
        
        foreach ($entries as $entry) {
            $companyName = $entry->company->name;
            $monthData[$companyName] = $entry->revenue;
        }
        
        $monthlyData[] = $monthData;
    }
    
    // Get metrics
    $metrics = Metric::first();
    
    return response()->json([
        'companies' => $companies->map(function($company) {
            return [
                'id' => $company->id,
                'name' => $company->name
            ];
        }),
        'monthlyData' => $monthlyData,
        'metrics' => [
            'totalRevenue' => $metrics->total_revenue,
            'revenueGrowth' => $metrics->revenue_growth,
            'averageTransaction' => $metrics->average_transaction,
            'transactionGrowth' => $metrics->transaction_growth,
            'totalCustomers' => $metrics->total_customers,
            'customerGrowth' => $metrics->customer_growth
        ]
    ])->header('Access-Control-Allow-Origin', '*')
      ->header('Access-Control-Allow-Methods', 'GET')
      ->header('Access-Control-Allow-Headers', 'Content-Type');
});

// New endpoints for more complex operations
Route::get('/companies/{company}', function (Company $company) {
    return response()->json([
        'company' => [
            'id' => $company->id,
            'name' => $company->name
        ],
        'monthlyData' => $company->monthlyData->map(function($data) {
            return [
                'month' => $data->month,
                'revenue' => $data->revenue
            ];
        })
    ])->header('Access-Control-Allow-Origin', '*');
});

// Endpoint to get metrics
Route::get('/metrics', function () {
    $metrics = Metric::first();
    
    return response()->json([
        'metrics' => [
            'totalRevenue' => $metrics->total_revenue,
            'revenueGrowth' => $metrics->revenue_growth,
            'averageTransaction' => $metrics->average_transaction,
            'transactionGrowth' => $metrics->transaction_growth,
            'totalCustomers' => $metrics->total_customers,
            'customerGrowth' => $metrics->customer_growth
        ]
    ])->header('Access-Control-Allow-Origin', '*');
});

// Endpoint to get monthly data
Route::get('/monthly-data', function () {
    $months = MonthlyData::select('month')->distinct()->get()->pluck('month');
    $monthlyData = [];
    
    foreach ($months as $month) {
        $monthData = ['month' => $month];
        $entries = MonthlyData::where('month', $month)->with('company')->get();
        
        foreach ($entries as $entry) {
            $monthData[$entry->company->name] = $entry->revenue;
        }
        
        $monthlyData[] = $monthData;
    }
    
    return response()->json([
        'monthlyData' => $monthlyData
    ])->header('Access-Control-Allow-Origin', '*');
});