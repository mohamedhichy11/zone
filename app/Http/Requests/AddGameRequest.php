<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddGameRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'name' => 'required|min:1|max:255',
            'prix' => 'required|numeric|min:0',
            'category' => 'required|string',
            'desc' => 'required|min:5',
            'solde' => 'nullable|boolean',
            'top' => 'nullable|string',
        ];

        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
        } else {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name is too short',
            'prix.required' => 'Price is required',
            'prix.numeric' => 'Price must be a valid number',
            'prix.min' => 'Price cannot be negative',
            'category.required' => 'Category is required',
            'desc.required' => 'Description is required',
            'desc.min' => 'Description is too short',
            'image.required' => 'Image is required',
            'image.image' => 'File must be an image',
            'image.mimes' => 'Image must be jpeg, png, jpg, gif, or webp',
            'image.max' => 'Image must not exceed 2MB',
        ];
    }
}
