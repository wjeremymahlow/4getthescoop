<?php

namespace App\Http\Controllers;

use App\Models\CateringRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = auth()->user();

        $stats = [
            'pending' => $user->cateringRequests()->pending()->count(),
            'confirmed' => $user->cateringRequests()->confirmed()->upcoming()->count(),
            'total' => $user->cateringRequests()->count(),
        ];

        $recentRequests = $user->cateringRequests()
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('dashboard.index', compact('stats', 'recentRequests'));
    }

    public function requests(): View
    {
        $requests = auth()->user()->cateringRequests()
            ->orderBy('event_date', 'desc')
            ->paginate(10);

        return view('dashboard.requests', compact('requests'));
    }

    public function cancelRequest(CateringRequest $cateringRequest): RedirectResponse
    {
        if ($cateringRequest->user_id !== auth()->id()) {
            abort(403);
        }

        if (!in_array($cateringRequest->status, ['pending', 'reviewed'])) {
            return back()->with('error', 'This request cannot be cancelled.');
        }

        $cateringRequest->update(['status' => 'cancelled']);

        return back()->with('success', 'Request cancelled successfully.');
    }
}
