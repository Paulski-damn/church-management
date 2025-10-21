<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOfficerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name'      => 'required|string|max:255',
            'middle_name'     => 'nullable|string|max:255',
            'last_name'       => 'required|string|max:255',
            'position'        => 'required|string|max:255',
            'board_id'        => 'required|exists:boards,id',
            'department'      => 'nullable|string|max:255',
            'hierarchy_level' => 'required|integer|min:0|max:4',
            'bio'             => 'nullable|string|max:1000',
            'email'           => 'nullable|email|max:255',
            'contact_number'  => 'nullable|string|max:20',
            'photo'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order'           => 'nullable|integer|min:0',
            'status'          => 'required|in:active,inactive',
            'term_start'      => 'nullable|date',
            'term_end'        => 'nullable|date|after_or_equal:term_start',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'The first name field is required.',
            'last_name.required'  => 'The last name field is required.',
            'board_id.required'   => 'Please select a board.',
            'status.in'           => 'Status must be either active or inactive.',
            'photo.image'         => 'Uploaded file must be an image.',
            'term_end.after_or_equal' => 'End date must be after or equal to start date.',
        ];
    }
}