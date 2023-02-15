<?php

declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Requests extends Component
{
    private array $requests;

    public function __construct(array $requests)
    {
        $this->requests = $requests;
    }

    public function render()
    {
        return view(
            'components.requests',
            [
                'requests' => $this->requests,
            ]
        );
    }
}
