## d - Containers
## vldt - Run psr validates rules

d-up: ## Create and start all docker containers.
	@docker-compose -f docker/docker-compose.yml up -d --no-deps --build --remove-orphans

d-down: ## Stop and remove all docker containers.
	@docker-compose -f docker/docker-compose.yml down

d-down-v: ## Stop and remove all docker containers and information's.
	@docker-compose -f docker/docker-compose.yml down -v

d-restart: ## Restart all docker containers.
	@docker-compose -f docker/docker-compose.yml restart

d-config: ## List the configuration
	@docker-compose -f docker/docker-compose.yml config

d-prune: ## Remove ALL unused docker resources, including volumes
	@docker system prune -a -f --volumes

t-stan:	./vendor/bin/phpstan analyse --level=max src tests

t-unit:	./vendor/bin/phpunit ./tests

t-cs:	./vendor/bin/php-cs-fixer fix src -v --dry-run