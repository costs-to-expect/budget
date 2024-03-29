<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ValidationErrorMessage extends Component
{
    private array $errors;

    public function __construct(string $field)
    {
        $errors = session()->get('validation.errors');

        if (is_array($errors) && array_key_exists($field, $errors) === true) {
            $this->errors = $errors[$field]['errors'];
        } else {
            $this->errors = [];
        }
    }

    public function render()
    {
        return view(
            'components.validation-error-message',
            [
                'has_error' => count($this->errors) > 0,
                'errors' => $this->errors,
            ]
        );
    }
}
