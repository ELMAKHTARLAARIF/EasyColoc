<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDepenseRequest extends FormRequest
{
    /**
     * Allow the request
     */
    public function authorize(): bool
    {
        return true; 
        // You can add permission logic later
    }

    /**
     * Validation rules
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'payer_id' => 'required|exists:users,id',
            'colocation_id' => 'required|exists:colocations,id',
            'category' => 'required|string|max:255',
            'date' => 'required|date',
        ];
    }

    /**
     * Custom error messages (optional)
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Le titre est obligatoire.',
            'amount.required' => 'Le montant est obligatoire.',
            'amount.numeric' => 'Le montant doit être un nombre.',
        ];
    }
}