<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Spatie\Analytics\OrderBy;
use Spatie\Analytics\Facades\Analytics;

class AdminController extends Controller
{
    public function index()
    {
        $analyticsData = [
            'totalUsers' => Analytics::get(Period::months(1), ['totalUsers'])[0]['totalUsers'],
            'browsers' => Analytics::fetchTopBrowsers(Period::months(1)),
            'operatingSystems' => Analytics::fetchTopOperatingSystems(Period::months(1), 10),
            'citiesCountries' => Analytics::get(Period::months(1), ['totalUsers'], ['city', 'country'], 10, [OrderBy::dimension('country', true), OrderBy::metric('totalUsers', true)]),
            'events' => Analytics::get(Period::months(1), ['totalUsers'], ['eventName'], 10)
        ];
        // dd($analyticsData);
        return view('admin.index')->with('title', 'Dashboard')->with('data', $analyticsData);
    }
}
