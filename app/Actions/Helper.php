<?php
declare(strict_types=1);

namespace App\Actions;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Helper
{
    public static function createFrequencyArray($input): array
    {
        $frequency = [ 'type' => $input['frequency_option'] ];
        if ($frequency['type'] === 'monthly') {
            $frequency['exclusions'] = [];
            if ($input['monthly_day'] !== null) {
                $frequency['day'] = (int) $input['monthly_day'];
            } else {
                $frequency['day'] = null;
            }

            if (array_key_exists('exclusion', $input)) {
                foreach ($input['exclusion'] as $__month) {
                    $frequency['exclusions'][] = (int) $__month;
                }
            }
        }

        if ($frequency['type'] === 'annually') {
            if ($input['annually_day'] !== null) {
                $frequency['day'] = (int) $input['annually_day'];
            } else {
                $frequency['day'] = null;
            }
            $frequency['month'] = (int) $input['annually_month'];
        }

        ksort($frequency);

        return $frequency;
    }
}
