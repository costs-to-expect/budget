<?php

declare(strict_types=1);

namespace App\Actions;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
abstract class Action
{
    protected string $message;

    protected array $validation_errors = [];

    protected array $parameters = [];

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function getValidationErrors(): array
    {
        return $this->validation_errors;
    }
}
