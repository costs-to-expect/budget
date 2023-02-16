<?php

declare(strict_types=1);

namespace App\Service\Budget;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class ProgressBar
{
    private array $ranges = [
        5 => [
            'max' => 5,
            'percentage' => 3,
        ],
        15 => [
            'max' => 15,
            'percentage' => 5,
        ],
        25 => [
            'max' => 25,
            'percentage' => 10,
        ],
        50 => [
            'max' => 50,
            'percentage' => 25,
        ],
        100 => [
            'max' => 100,
            'percentage' => 30,
        ],
        250 => [
            'max' => 250,
            'percentage' => 40,
        ],
        500 => [
            'max' => 500,
            'percentage' => 50,
        ],
        750 => [
            'max' => 750,
            'percentage' => 60,
        ],
        1000 => [
            'max' => 1000,
            'percentage' => 70,
        ],
        1500 => [
            'max' => 1500,
            'percentage' => 80,
        ],
        2500 => [
            'max' => 1500,
            'percentage' => 95,
        ],
    ];

    public function __construct(private readonly float $amount)
    {
    }

    public function percentage(): int
    {
        $percentage = $this->ranges[1500]['percentage'];

        foreach ($this->ranges as $range) {
            if ($this->amount < $range['max']) {
                $percentage = $range['percentage'];
                break;
            }
        }

        return $percentage;
    }
}
