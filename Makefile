ifeq (, $(shell which docker-compose))
	DOCKER_COMPOSE := $(shell echo docker compose)
else
	DOCKER_COMPOSE := $(shell echo docker-compose)
endif

composer-install:
	$(DOCKER_COMPOSE) exec php-cli composer install -vv -o

database-create:
	$(DOCKER_COMPOSE) exec php-cli php bin/console doctrine:database:create --no-interaction

migration-migrate:
	$(DOCKER_COMPOSE) exec php-cli php bin/console doctrine:migration:migrate --no-interaction