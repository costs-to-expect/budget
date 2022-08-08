<?php
declare(strict_types=1);

namespace App\View\Components;

use Illuminate\View\Component;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Requests extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view(
            'components.requests',
            []
        );
    }
}
