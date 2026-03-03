<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UpdateDepenseRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
        ];
    }

    /**
     * Custom error messages (optional)
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Le titre est obligatoire.',
            'amount.required' => 'Le montant est obligatoire.',
            'amount.numeric' => 'Le montant doit être un nombre.',
        ];
    }
}