# Budget by Costs to Expect

## Overview

Budgeting, powered by the Costs to Expect API.

## Set up

I'm going to assume you are using Docker, if not, you should be able to work out what you need to run for your 
development setup.

Go to the project root directory and run the below.

### Environment

* $ `docker network create costs.network` *
* $ `docker compose build`
* $ `docker compose up`

*We include a network for local development purposes, I need to connect to a local version of the Costs to Expect
API, You probably don't need this so remove the network section from your docker compose file and don't create the
network.

### Tests

We include a suite of tests for the Budget service, run them as below.

* $ `docker exec costs.budget.app vendor/bin/phpunit tests/`

