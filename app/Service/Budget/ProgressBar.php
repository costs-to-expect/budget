<?php

declare(strict_types=1);

namespace App\Service\Budget;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2022
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class ProgressBar
{
    private array $ranges = [
        25 => [
            'max' => 25,
            'percentage' => 5
        ],
        50 => [
            'max' => 50,
            'percentage' => 10
        ],
        100 => [
            'max' => 100,
            'percentage' => 15
        ],
        250 => [
            'max' => 150,
            'percentage' => 25
        ],
        500  => [
            'max' => 500,
            'percentage' => 50
        ],
        1000 => [
            'max' => 1000,
            'percentage' => 95
        ],
    ];

    public function __construct(private readonly float $amount)
    {

    }

    public function percentage(): int
    {
        $percentage = $this->ranges[1000]['percentage'];

        foreach ($this->ranges as $range) {
            if ($this->amount < $range['max']) {
                $percentage = $range['percentage'];
                break;
            }
        }

        return $percentage;
    }
}
