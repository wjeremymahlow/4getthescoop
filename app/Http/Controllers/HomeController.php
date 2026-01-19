<?php

namespace App\Http\Controllers;

use App\Models\CalendarEntry;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $availableDates = CalendarEntry::available()
            ->future()
            ->orderBy('date')
            ->take(5)
            ->get();

        return view('home', compact('availableDates'));
    }
}
