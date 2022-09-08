<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BudgetTestAccountTest extends TestCase
{
    use WithFaker;

    // Monthly income added to balance
    // Monthly income not added to balance when excluded
    // Annual income added to balance

    // Monthly income added to balance - Pagination
    // Monthly income not added to balance when excluded - Pagination
    // Annual income added to balance - Pagination

    // Monthly expense subtracted from balance
    // Monthly expense not subtracted from balance when excluded
    // Annual expense subtracted from balance

    // Monthly expense subtracted from balance - Pagination
    // Monthly expense not subtracted from balance when excluded - Pagination
    // Annual expense subtracted from balance - Pagination

    // Monthly saving removed from one account and added to another
    // Monthly saving not removed from one account and added to another when excluded
    // Annual saving removed from one account and added to another

    // Monthly saving removed from one account and added to another - Pagination
    // Monthly saving not removed from one account and added to another when excluded - Pagination
    // Annual saving removed from one account and added to another - Pagination

    // Monthly and annual expense subtracted from balance
    // Monthly and annual expense and Monthly income added and subtracted as expected

    // Monthly and annual expense subtracted from balance - Pagination
    // Monthly and annual expense and Monthly income added and subtracted as expected - Pagination
}
