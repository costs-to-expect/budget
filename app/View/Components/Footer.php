<?php
declare(strict_types=1);

namespace App\View\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\View\Component;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Footer extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        $config = Config::get('app.config');

        return view(
            'components.footer',
            [
                'version' => $config['version'],
                'release_date' => $config['release_date'],
            ]
        );
    }
}
