<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            return $this->getUpdateRules();
        }

        return $this->getCreateRules();
    }

    /**
     * Get Create Rules
     *
     * @return string[][]
     */
    private function getCreateRules()
    {
        return [
            'description' => ['required', 'string'],
        ];
    }

    /**
     * Get Update Rules
     *
     * @return string[][]
     */
    private function getUpdateRules()
    {
        return [
            'description' => ['sometimes', 'string'],
            'completed_at' => ['sometimes', 'nullable', 'date'],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if ($this->filled('mark_complete')) {

            $this->merge([
                'completed_at' => $this->get('mark_complete') ? now() : null,
            ]);

        }
    }
}
