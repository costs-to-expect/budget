# Budget by Costs to Expect

## A budgeting tool so easy to use, it’s child play!

A free, open source budgeting tool powered by the Costs to Expect API. This tool is designed to help you 
budget for your next big purchase, or just to help you keep track of your spending. It’s easy to use, and it’s 
free!

Check out our [site](https://budget.costs-to-expect.com) for more information.

Our [FAQs](https://budget.costs-to-expect.com/faqs), [Getting Started](https://budget.costs-to-expect.com/getting-started) 
and [Workflow](https://budget.costs-to-expect.com/workflow) pages should cover most of your questions, but if you 
have any, please don't hesitate to contact us.

## Simple

Our overview is so clear and simple, a child could manage your budget. We wouldn’t recommend it, but you get the idea.

![Budget overview](/public/images/budget.png)

## Projections

Simply input your income and outgoings to see projected balances and savings for the months and years ahead. Handy, right?

![Budget overview](/public/images/projections.png)

## Exclusions

We understand that not all expenses are monthly - we provide the tools to set exclusions, ensuring your budget is completely customisable and up-to-date.

![Budget overview](/public/images/exclusions.png)

## Set up

I'm going to assume you are using Docker, if not, you should be able to work out what you need to run for your 
development setup from the steps below.

Go to the project root directory and run the below commands:

### Docker

- Set all the relevant ENV variables, copy .env.example, at a minimum you need to set all the `DB_*` variables.
- I use mailgun, if you use something else, you'll need to change the mail driver in the .env file.

```bash
$ `docker network create costs.network` *
$ `docker compose build`
$ `docker compose up`
```
### Install all dependencies, composer, yarn, etc.

- I typically install all my dependencies through PHPStorm, but you should install then how you normally would.

```bash
$ `docker exec costs.budget.app php artisan key:generate`
$ `docker exec costs.budget.app php artisan migrate`
```

*We include a network for local development purposes, I need to connect to a local version of the Costs to Expect
API, You probably don't need this so remove the network section from your docker compose file and don't create the
network.

### Tests

We include a suite of tests for the Budget service, run them as below.

```bash
$ `docker exec costs.budget.app vendor/bin/phpunit tests/`
```
