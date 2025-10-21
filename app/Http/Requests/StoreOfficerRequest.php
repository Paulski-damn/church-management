<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfficerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // you can add auth logic later
    }

    public function rules(): array
    {
        return [
            'first_name'       => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'middle_name'      => 'nullable|string|max:255|regex:/^[\pL\s\-]+$/u',
            'last_name'        => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'position'         => 'required|string|max:255|regex:/^[\pL\s\-\/]+$/u',
            'board_id'         => 'required|exists:boards,id',
            'department'       => 'nullable|string|max:255',
            'hierarchy_level'  => 'required|integer|min:0|max:4',
            'bio'              => 'nullable|string|max:1000',
            'email'            => 'nullable|email:rfc,dns|max:255',
            'contact_number'   => 'nullable|string|max:20|regex:/^[0-9\+\-\(\)\s]+$/',
            'photo'            => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order'            => 'nullable|integer|min:0',
            'term_start'       => 'nullable|date',
            'term_end'         => 'nullable|date|after_or_equal:term_start',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'The first name field is required.',
            'last_name.required'  => 'The last name field is required.',
            'board_id.required'   => 'Please select a board.',
            'photo.image'         => 'Uploaded file must be an image.',
            'term_end.after_or_equal' => 'End date must be after or equal to start date.',
        ];
    }
}