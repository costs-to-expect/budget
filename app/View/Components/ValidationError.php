<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ValidationError extends Component
{
    private bool $has_error = false;

    public function __construct(string $field)
    {
        $errors = session()->get('validation.errors');

        if (is_array($errors) && array_key_exists($field, $errors) === true) {
            $this->has_error = true;
        }
    }

    public function render()
    {
        return view(
            'components.validation-error',
            [
                'has_error' => $this->has_error,
            ]
        );
    }
}
