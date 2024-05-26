ifeq (, $(shell which docker-compose))
	DOCKER_COMPOSE := $(shell echo docker compose)
else
	DOCKER_COMPOSE := $(shell echo docker-compose)
endif

composer-install:
	$(DOCKER_COMPOSE) exec php-cli composer install -vv -o

database-create:
	$(DOCKER_COMPOSE) exec php-cli php bin/console doctrine:database:create --no-interaction

database-drop:
	$(DOCKER_COMPOSE) exec php-cli php bin/console doctrine:database:drop --if-exists --force --no-interaction

database-refresh: database-drop database-create

migration-migrate:
	$(DOCKER_COMPOSE) exec php-cli php bin/console doctrine:migration:migrate --no-interaction

migration-create:
	$(DOCKER_COMPOSE) exec php-cli php bin/console make:migration