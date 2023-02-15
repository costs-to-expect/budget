<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Budget\AdoptDemo;
use App\Actions\Budget\Demo;
use App\Actions\Budget\Start;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

/**
 * @author Dean Blackborough <dean@g3d-development.com>
 * @copyright Dean Blackborough (Costs to Expect) 2018-2023
 * @license https://github.com/costs-to-expect/budget/blob/main/LICENSE
 */
class Index extends Controller
{
    public function adoptDemoProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new AdoptDemo();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id
        );

        if ($result === 204) {
            return redirect()->route('home')
                ->with('status', 'demo-adopted');
        }

        abort($result, $action->getMessage());
    }

    public function demo(Request $request)
    {
        $this->bootstrap();

        $budget = $this->setUpBudget($request);
        if ($budget->hasAccounts() === true || $budget->hasBudget() === true) {
            return redirect()->route('home');
        }

        $currencies_response = $this->api->currencies();
        if ($currencies_response['status'] !== 200) {
            abort(404, 'Cannot fetch the currencies from the API');
        }

        // Show GBP first
        $currencies = [];
        $currencies[0] = [];
        foreach ($currencies_response['content'] as $currency) {
            if ($currency['code'] === 'GBP') {
                $currencies[0] = $currency;
            } else {
                $currencies[] = $currency;
            }
        }

        return view(
            'budget.demo',
            [
                'currencies' => $currencies,
                'loading' => $request->query('loading') !== null,

                'requests' => $this->api->requests(),
            ]
        );
    }

    public function demoProcess(Request $request): RedirectResponse
    {
        $this->bootstrap($request);

        $action = new Demo();
        $result = $action(
            $this->resource_type_id,
            $this->resource_id,
            $request->cookie($this->config['cookie_bearer']),
            $request->input('currency_id')
        );

        if ($result === 201) {
            return redirect()->route('demo', ['loading' => true]);
        }

        return redirect()->route('home');
    }

    public function home(Request $request): View
    {
        $this->bootstrap();

        $budget = $this->setUpBudget($request);

        return view(
            'home',
            [
                'status' => session()->get('status'),
                'demo' => $this->demo,

                'accounts' => $budget->accounts(),
                'months' => $budget->months(),
                'pagination' => $budget->paginationParameters(),
                'view_end' => $budget->viewEndPeriod(),
                'projection' => $budget->projection(),

                'requests' => $this->api->requests(),

                'has_accounts' => $budget->hasAccounts(),
                'has_budget' => $budget->hasBudget(),
                'has_savings_account' => $budget->hasSavingsAccount(),
                'has_paid_items' => $budget->hasPaidItems(),
                'now_visible' => $budget->nowVisible(),
            ]
        );
    }

    public function landing(): View
    {
        return view('landing');
    }

    public function start(Request $request): View
    {
        $this->bootstrap();

        $currencies_response = $this->api->currencies();
        if ($currencies_response['status'] !== 200) {
            abort(404, 'Cannot fetch the currencies from the API');
        }

        // Show GBP first
        $currencies = [];
        $currencies[0] = [];
        foreach ($currencies_response['content'] as $currency) {
            if ($currency['code'] === 'GBP') {
                $currencies[0] = $currency;
            } else {
                $currencies[] = $currency;
            }
        }

        return view(
            'budget.start',
            [
                'currencies' => $currencies,

                'requests' => $this->api->requests(),

                'color' => '#'.dechex(random_int(0, 16777215)),
            ]
        );
    }

    public function startProcess(Request $request): RedirectResponse
    {
        $this->bootstrap();

        $action = new Start();
        $result = $action(
            $this->api,
            $this->resource_type_id,
            $this->resource_id,
            $request->only(['name', 'type', 'description', 'currency_id', 'balance', 'color'])
        );

        if ($result === 204) {
            return redirect()->route('home')
                ->with('status', 'account-added');
        }

        if ($result === 422) {
            return redirect()
                ->route('start')
                ->withInput()
                ->with('validation.errors', $action->getValidationErrors());
        }

        abort($result, $action->getMessage());
    }

    public function isDemoLoaded(Request $request): Response
    {
        $this->bootstrap();

        return response()->json(['demo' => $this->demo]);
    }
}
