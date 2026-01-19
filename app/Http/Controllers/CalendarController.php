<?php

namespace App\Http\Controllers;

use App\Models\CalendarEntry;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CalendarController extends Controller
{
    public function index(): View
    {
        return view('calendar');
    }

    public function availability(Request $request): JsonResponse
    {
        $start = $request->input('start');
        $end = $request->input('end');

        $entries = CalendarEntry::query()
            ->when($start, fn ($q) => $q->where('date', '>=', $start))
            ->when($end, fn ($q) => $q->where('date', '<=', $end))
            ->get();

        $events = $entries->map(function ($entry) {
            return [
                'id' => $entry->id,
                'title' => ucfirst($entry->status),
                'start' => $entry->date->format('Y-m-d'),
                'allDay' => true,
                'backgroundColor' => match ($entry->status) {
                    'available' => '#22c55e',
                    'blocked' => '#ef4444',
                    'booked' => '#3b82f6',
                    default => '#6b7280',
                },
                'borderColor' => match ($entry->status) {
                    'available' => '#16a34a',
                    'blocked' => '#dc2626',
                    'booked' => '#2563eb',
                    default => '#4b5563',
                },
                'extendedProps' => [
                    'status' => $entry->status,
                    'notes' => $entry->notes,
                ],
            ];
        });

        return response()->json($events);
    }
}
