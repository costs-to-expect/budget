<?php
declare(strict_types=1);

namespace App\Actions;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
abstract class Action
{
    protected string $message;

    protected array $validation_errors = [];

    public function getValidationErrors(): array
    {
        return $this->validation_errors;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
