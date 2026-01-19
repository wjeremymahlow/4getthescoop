<?php

namespace App\Http\Controllers;

use App\Http\Requests\CateringRequestStoreRequest;
use App\Models\CateringRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CateringRequestController extends Controller
{
    public function create(Request $request): View
    {
        $selectedDate = $request->query('date');

        return view('catering.create', compact('selectedDate'));
    }

    public function store(CateringRequestStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['status'] = 'pending';

        CateringRequest::create($data);

        return redirect()->route('catering.success');
    }

    public function success(): View
    {
        return view('catering.success');
    }
}
