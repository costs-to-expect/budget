<?php
declare(strict_types=1);

namespace App\Actions;

use DateTimeZone;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Helper
{
    public static function createFrequencyArray($input, DateTimeZone $timezone): array
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

        if ($frequency['type'] === 'one-off') {
            $start_date = new \DateTimeImmutable($input['start_date'], $timezone);
            $frequency['day'] = null;
            $frequency['month'] = (int) $start_date->format('n');
            $frequency['year'] = (int) $start_date->format('Y');
        }

        ksort($frequency);

        return $frequency;
    }
}
