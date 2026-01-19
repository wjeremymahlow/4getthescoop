<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CateringRequestStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'event_date' => ['required', 'date', 'after:today'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
            'estimated_guests' => ['required', 'integer', 'min:1', 'max:1000'],
            'venue_name' => ['required', 'string', 'max:255'],
            'address_line_1' => ['required', 'string', 'max:255'],
            'address_line_2' => ['nullable', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'size:2'],
            'zip_code' => ['required', 'string', 'max:10'],
            'contact_name' => ['required', 'string', 'max:255'],
            'contact_email' => ['required', 'email', 'max:255'],
            'contact_phone' => ['required', 'string', 'max:20'],
            'event_type' => ['required', Rule::in([
                'birthday_party',
                'corporate_event',
                'wedding',
                'school_event',
                'community_event',
                'private_party',
                'other',
            ])],
            'special_requests' => ['nullable', 'string', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'event_date.after' => 'The event date must be a future date.',
            'end_time.after' => 'The end time must be after the start time.',
            'state.size' => 'Please use a 2-letter state abbreviation (e.g., TN).',
        ];
    }
}
